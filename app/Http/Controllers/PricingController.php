<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Contracts\View\View;

class PricingController extends Controller
{
    public function index(): View
    {
        $products = Product::published()
            ->with(['pricings', 'faqs'])
            ->orderBy('order')
            ->get();

        return view('pricing.index', compact('products'));
    }
}
