<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use App\Models\ContactMessage;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function createOrder(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'order_code' => ['required', 'string', 'max:50'],
            'customer_name' => ['required', 'string', 'max:255'],
            'customer_email' => ['required', 'email', 'max:255'],
            'customer_phone' => ['required', 'string', 'max:30'],
            'product_name' => ['required', 'string', 'max:255'],
            'plan_name' => ['required', 'string', 'max:255'],
            'amount' => ['required', 'numeric', 'min:0'],
            'billing_cycle' => ['nullable', 'string', 'max:50'],
        ]);

        $productId = null;
        $product = Product::where('name', 'like', "%{$validated['product_name']}%")->first();
        if ($product) {
            $productId = $product->id;
        }

        $durationDays = 365;
        $cycle = strtolower($validated['billing_cycle'] ?? 'yearly');
        if (str_contains($cycle, 'tháng') || str_contains($cycle, 'month')) {
            $durationDays = 30;
        } elseif (str_contains($cycle, 'vĩnh viễn') || str_contains($cycle, 'lifetime')) {
            $durationDays = 9999;
        }

        $order = Order::updateOrCreate(
            ['order_code' => $validated['order_code']],
            [
                'user_id' => Auth::id(),
                'customer_name' => $validated['customer_name'],
                'customer_email' => $validated['customer_email'],
                'customer_phone' => $validated['customer_phone'],
                'product_id' => $productId,
                'product_name' => $validated['product_name'],
                'plan_name' => $validated['plan_name'],
                'billing_cycle' => $validated['billing_cycle'] ?? '1 Năm',
                'amount' => $validated['amount'],
                'currency' => 'VND',
                'payment_method' => 'vietqr',
                'payment_status' => 'pending',
                'license_duration_days' => $durationDays,
                'ip_address' => $request->ip(),
            ]
        );

        // Also record in contact_messages for notifications
        ContactMessage::create([
            'name' => $validated['customer_name'],
            'email' => $validated['customer_email'],
            'phone' => $validated['customer_phone'],
            'subject' => "[ĐƠN HÀNG MỚI] {$order->order_code} - {$order->product_name}",
            'product_interest' => $order->product_name,
            'service_interest' => $order->plan_name,
            'message' => "Mã đơn hàng: {$order->order_code} | Số tiền: ".number_format($order->amount).' VNĐ | Khách hàng đăng ký mua qua VietQR.',
            'status' => 'pending',
            'ip_address' => $request->ip(),
        ]);

        ActivityLog::log('order_created', "Đơn hàng mới {$order->order_code} ({$order->product_name}) đã được tạo.", Auth::user());

        return response()->json([
            'success' => true,
            'order_code' => $order->order_code,
            'order_id' => $order->id,
        ]);
    }

    public function confirmPayment(Request $request, string $orderCode): JsonResponse
    {
        $order = Order::where('order_code', $orderCode)->first();

        if ($order) {
            $order->update([
                'admin_notes' => 'Khách hàng bấm xác nhận đã chuyển khoản lúc: '.now()->format('d/m/Y H:i:s'),
            ]);
            ActivityLog::log('payment_notified', "Khách hàng {$order->customer_name} xác nhận đã chuyển khoản cho đơn {$order->order_code}.");
        }

        return response()->json([
            'success' => true,
            'message' => 'Ghi nhận xác nhận chuyển khoản thành công.',
        ]);
    }

    public function licenseCheck(Request $request): View
    {
        $query = trim($request->input('q', ''));
        $result = null;
        $searched = false;

        if ($query !== '') {
            $searched = true;
            $result = Order::where(function ($q) use ($query) {
                $q->where('license_key', $query)
                    ->orWhere('customer_phone', $query)
                    ->orWhere('order_code', $query);
            })->where('payment_status', 'paid')
                ->with('product')
                ->latest()
                ->first();
        }

        return view('pages.license-check', compact('query', 'result', 'searched'));
    }
}
