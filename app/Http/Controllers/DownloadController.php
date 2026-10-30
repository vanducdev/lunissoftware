<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Contracts\View\View;

class DownloadController extends Controller
{
    public function index(): View
    {
        $products = Product::published()
            ->with('category')
            ->orderBy('order')
            ->get();

        return view('pages.downloads', compact('products'));
    }
}
