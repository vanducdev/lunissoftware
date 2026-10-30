<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\ProductService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request, ProductService $productService): JsonResponse
    {
        $term = (string) $request->query('q', '');

        $results = $productService->liveSearch($term, 5);

        return response()->json([
            'success' => true,
            'query' => $term,
            'data' => $results,
        ]);
    }
}
