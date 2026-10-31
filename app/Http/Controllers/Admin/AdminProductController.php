<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductFeature;
use App\Models\ProductImage;
use App\Models\ProductPricing;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class AdminProductController extends Controller
{
    public function index(Request $request): View
    {
        $query = Product::with('category');

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where('name', 'like', "%{$search}%")
                ->orWhere('tagline', 'like', "%{$search}%");
        }

        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $products = $query->orderBy('order')->orderByDesc('id')->paginate(10)->withQueryString();
        $categories = ProductCategory::orderBy('order')->get();

        return view('admin.products.index', compact('products', 'categories'));
    }

    public function create(): View
    {
        $categories = ProductCategory::where('is_active', true)->orderBy('order')->get();

        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'category_id' => ['nullable', 'exists:product_categories,id'],
            'tagline' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'content' => ['nullable', 'string'],
            'version' => ['nullable', 'string', 'max:50'],
            'download_url' => ['nullable', 'url', 'max:255'],
            'video_url' => ['nullable', 'url', 'max:255'],
            'status' => ['required', 'in:draft,published'],
            'is_featured' => ['nullable', 'boolean'],
            'order' => ['nullable', 'integer'],
            'banner_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp,svg', 'max:5120'],
            'logo' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp,svg', 'max:2048'],
            'gallery_images.*' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp,svg', 'max:5120'],
        ]);

        $validated['slug'] = Str::slug($validated['name']);
        $originalSlug = $validated['slug'];
        $count = 1;
        while (Product::where('slug', $validated['slug'])->exists()) {
            $validated['slug'] = "{$originalSlug}-".$count++;
        }

        $validated['is_featured'] = $request->boolean('is_featured');
        $validated['order'] = $request->input('order', 0);

        if ($request->hasFile('banner_image')) {
            $validated['banner_image'] = $request->file('banner_image')->store('products/banners', 'public');
        }

        if ($request->hasFile('logo')) {
            $validated['logo'] = $request->file('logo')->store('products/logos', 'public');
        }

        $product = Product::create($validated);

        // Upload Gallery Images if present
        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $idx => $file) {
                $path = $file->store('products/gallery', 'public');
                $product->images()->create([
                    'image_path' => $path,
                    'caption' => $request->input("gallery_captions.{$idx}", $product->name.' Screenshot '.($idx + 1)),
                    'order' => $idx + 1,
                ]);
            }
        }

        // Add features if present
        if ($request->has('features') && is_array($request->features)) {
            foreach ($request->features as $idx => $feat) {
                if (! empty($feat['title'])) {
                    ProductFeature::create([
                        'product_id' => $product->id,
                        'title' => $feat['title'],
                        'description' => $feat['description'] ?? null,
                        'icon' => $feat['icon'] ?? 'check-circle',
                        'order' => $idx + 1,
                    ]);
                }
            }
        }

        // Add pricing if present
        if ($request->has('pricings') && is_array($request->pricings)) {
            foreach ($request->pricings as $idx => $price) {
                if (! empty($price['plan_name'])) {
                    ProductPricing::create([
                        'product_id' => $product->id,
                        'plan_name' => $price['plan_name'],
                        'price' => $price['price'] ?? 0,
                        'currency' => $price['currency'] ?? '₫',
                        'billing_cycle' => $price['billing_cycle'] ?? 'yearly',
                        'is_popular' => isset($price['is_popular']),
                        'features' => array_filter(array_map('trim', explode("\n", $price['features_text'] ?? ''))),
                        'cta_text' => $price['cta_text'] ?? 'Đăng ký ngay',
                        'cta_link' => $price['cta_link'] ?? null,
                        'order' => $idx + 1,
                    ]);
                }
            }
        }

        ActivityLog::log('product_created', "Đã tạo sản phẩm mới: {$product->name}");

        return redirect()->route('admin.products.index')->with('success', "Sản phẩm '{$product->name}' đã được tạo thành công.");
    }

    public function edit(Product $product): View
    {
        $categories = ProductCategory::where('is_active', true)->orderBy('order')->get();
        $product->load(['features', 'pricings', 'faqs', 'images']);

        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', Rule::unique('products')->ignore($product->id)],
            'category_id' => ['nullable', 'exists:product_categories,id'],
            'tagline' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'content' => ['nullable', 'string'],
            'version' => ['nullable', 'string', 'max:50'],
            'download_url' => ['nullable', 'url', 'max:255'],
            'video_url' => ['nullable', 'url', 'max:255'],
            'status' => ['required', 'in:draft,published'],
            'is_featured' => ['nullable', 'boolean'],
            'order' => ['nullable', 'integer'],
            'banner_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp,svg', 'max:5120'],
            'logo' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp,svg', 'max:2048'],
            'gallery_images.*' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp,svg', 'max:5120'],
        ]);

        $validated['is_featured'] = $request->boolean('is_featured');
        $validated['order'] = $request->input('order', 0);

        // Handle Banner / Mockup Image
        if ($request->hasFile('banner_image')) {
            if ($product->banner_image && str_starts_with($product->banner_image, 'products/') && Storage::disk('public')->exists($product->banner_image)) {
                Storage::disk('public')->delete($product->banner_image);
            }
            $validated['banner_image'] = $request->file('banner_image')->store('products/banners', 'public');
        } elseif ($request->boolean('remove_banner_image')) {
            if ($product->banner_image && str_starts_with($product->banner_image, 'products/') && Storage::disk('public')->exists($product->banner_image)) {
                Storage::disk('public')->delete($product->banner_image);
            }
            $validated['banner_image'] = null;
        }

        // Handle Logo Image
        if ($request->hasFile('logo')) {
            if ($product->logo && str_starts_with($product->logo, 'products/') && Storage::disk('public')->exists($product->logo)) {
                Storage::disk('public')->delete($product->logo);
            }
            $validated['logo'] = $request->file('logo')->store('products/logos', 'public');
        } elseif ($request->boolean('remove_logo')) {
            if ($product->logo && str_starts_with($product->logo, 'products/') && Storage::disk('public')->exists($product->logo)) {
                Storage::disk('public')->delete($product->logo);
            }
            $validated['logo'] = null;
        }

        $product->update($validated);

        // Upload new Gallery Images
        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $idx => $file) {
                $path = $file->store('products/gallery', 'public');
                $product->images()->create([
                    'image_path' => $path,
                    'caption' => $request->input("gallery_captions.{$idx}", $product->name.' Screenshot '.($product->images()->count() + 1)),
                    'order' => $product->images()->count() + $idx + 1,
                ]);
            }
        }

        // Sync Features if provided
        if ($request->has('features') && is_array($request->features)) {
            $product->features()->delete();
            foreach ($request->features as $idx => $feat) {
                if (! empty($feat['title'])) {
                    ProductFeature::create([
                        'product_id' => $product->id,
                        'title' => $feat['title'],
                        'description' => $feat['description'] ?? null,
                        'icon' => $feat['icon'] ?? 'check-circle',
                        'order' => $idx + 1,
                    ]);
                }
            }
        }

        ActivityLog::log('product_updated', "Đã cập nhật sản phẩm: {$product->name}");

        return redirect()->route('admin.products.index')->with('success', "Cập nhật sản phẩm '{$product->name}' thành công.");
    }

    public function deleteImage(Product $product, ProductImage $image): RedirectResponse
    {
        if ($image->product_id === $product->id) {
            if ($image->image_path && Storage::disk('public')->exists($image->image_path)) {
                Storage::disk('public')->delete($image->image_path);
            }
            $image->delete();
            ActivityLog::log('product_image_deleted', "Đã xóa ảnh chụp màn hình của sản phẩm: {$product->name}");
        }

        return back()->with('success', 'Đã xóa ảnh thành công.');
    }

    public function destroy(Product $product): RedirectResponse
    {
        $name = $product->name;

        // Clean up stored files if any
        if ($product->banner_image && str_starts_with($product->banner_image, 'products/') && Storage::disk('public')->exists($product->banner_image)) {
            Storage::disk('public')->delete($product->banner_image);
        }
        if ($product->logo && str_starts_with($product->logo, 'products/') && Storage::disk('public')->exists($product->logo)) {
            Storage::disk('public')->delete($product->logo);
        }
        foreach ($product->images as $img) {
            if ($img->image_path && Storage::disk('public')->exists($img->image_path)) {
                Storage::disk('public')->delete($img->image_path);
            }
        }

        $product->delete();

        ActivityLog::log('product_deleted', "Đã xóa sản phẩm: {$name}");

        return redirect()->route('admin.products.index')->with('success', "Đã xóa sản phẩm '{$name}'.");
    }
}
