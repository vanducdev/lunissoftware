<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\Order;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

class AdminOrderController extends Controller
{
    public function index(Request $request): View
    {
        $query = Order::with(['user', 'product']);

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('order_code', 'like', "%{$search}%")
                    ->orWhere('customer_name', 'like', "%{$search}%")
                    ->orWhere('customer_email', 'like', "%{$search}%")
                    ->orWhere('customer_phone', 'like', "%{$search}%")
                    ->orWhere('license_key', 'like', "%{$search}%");
            });
        }

        if ($request->filled('status')) {
            $query->where('payment_status', $request->status);
        }

        $orders = $query->orderByDesc('created_at')->paginate(12)->withQueryString();

        $stats = [
            'total' => Order::count(),
            'pending' => Order::where('payment_status', 'pending')->count(),
            'paid' => Order::where('payment_status', 'paid')->count(),
            'revenue' => Order::where('payment_status', 'paid')->sum('amount'),
        ];

        return view('admin.orders.index', compact('orders', 'stats'));
    }

    public function show(Order $order): View
    {
        $order->load(['user', 'product']);

        return view('admin.orders.show', compact('order'));
    }

    public function approvePayment(Order $order): RedirectResponse
    {
        $order->activateLicense();

        ActivityLog::log('order_approved', "Đã duyệt đơn hàng {$order->order_code} và kích hoạt bản quyền key: {$order->license_key}");

        return back()->with('success', "Đơn hàng {$order->order_code} đã được duyệt thành công! Mã bản quyền: {$order->license_key}");
    }

    public function update(Request $request, Order $order): RedirectResponse
    {
        $validated = $request->validate([
            'payment_status' => ['required', 'in:pending,paid,cancelled,refunded'],
            'license_key' => ['nullable', 'string', 'max:100'],
            'license_expires_at' => ['nullable', 'date'],
            'device_count_allowed' => ['required', 'integer', 'min:1', 'max:100'],
            'admin_notes' => ['nullable', 'string', 'max:2000'],
        ]);

        $order->update($validated);

        ActivityLog::log('order_updated', "Đã cập nhật đơn hàng {$order->order_code}");

        return back()->with('success', "Cập nhật thông tin đơn hàng {$order->order_code} thành công.");
    }

    public function destroy(Order $order): RedirectResponse
    {
        $code = $order->order_code;
        $order->delete();

        ActivityLog::log('order_deleted', "Đã xóa đơn hàng {$code}");

        return redirect()->route('admin.orders.index')->with('success', "Đã xóa đơn hàng {$code} thành công.");
    }

    public function export(): StreamedResponse
    {
        $orders = Order::orderByDesc('created_at')->get();
        $csvFileName = 'orders_'.date('Y-m-d_His').'.csv';

        $headers = [
            'Content-Type' => 'text/csv; charset=utf-8',
            'Content-Disposition' => "attachment; filename=\"{$csvFileName}\"",
        ];

        return response()->stream(function () use ($orders) {
            $handle = fopen('php://output', 'w');
            fprintf($handle, chr(0xEF).chr(0xBB).chr(0xBF)); // UTF-8 BOM
            fputcsv($handle, ['Mã đơn hàng', 'Khách hàng', 'Email', 'Số điện thoại', 'Sản phẩm', 'Gói', 'Số tiền (VNĐ)', 'Trạng thái', 'Mã bản quyền', 'Hạn sử dụng', 'Ngày tạo']);

            foreach ($orders as $o) {
                fputcsv($handle, [
                    $o->order_code,
                    $o->customer_name,
                    $o->customer_email,
                    $o->customer_phone,
                    $o->product_name,
                    $o->plan_name,
                    number_format($o->amount, 0, ',', '.'),
                    $o->payment_status === 'paid' ? 'Đã thanh toán' : ($o->payment_status === 'pending' ? 'Chờ thanh toán' : $o->payment_status),
                    $o->license_key ?? 'Chưa cấp',
                    $o->license_expires_at ? $o->license_expires_at->format('d/m/Y') : 'Vĩnh viễn',
                    $o->created_at->format('d/m/Y H:i:s'),
                ]);
            }
            fclose($handle);
        }, 200, $headers);
    }
}
