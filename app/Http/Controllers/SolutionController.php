<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use Illuminate\Contracts\View\View;

class SolutionController extends Controller
{
    public function index(): View
    {
        $categories = ProductCategory::where('is_active', true)
            ->with(['products' => function ($q) {
                $q->where('status', 'published')->with('features');
            }])
            ->orderBy('order')
            ->get();

        return view('solutions.index', compact('categories'));
    }
}
