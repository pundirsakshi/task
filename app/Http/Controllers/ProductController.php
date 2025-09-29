<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        // Fetch all products from FakeStoreAPI
        $response = Http::get('https://fakestoreapi.com/products');

        if ($response->successful()) {
            $products = $response->json();
            Log::info('Products loaded: ' . count($products));
        } else {
            $products = [];
            Log::error('Failed to fetch products: ' . $response->status());
        }

        return view('shop', compact('products'));
    }

    public function show($id)
    {
        // Fetch single product from FakeStoreAPI
        $response = Http::get("https://fakestoreapi.com/products/{$id}");

        if ($response->successful()) {
            $product = $response->json();
        } else {
            abort(404, 'Product not found');
        }

        return view('product', compact('product'));
    }

    public function search(Request $request)
    {
        $query = $request->get('q');
        $category = $request->get('category');

        // Fetch all products first
        $response = Http::get('https://fakestoreapi.com/products');

        if ($response->successful()) {
            $allProducts = $response->json();

            // Filter products based on search query and category
            $products = collect($allProducts)->filter(function ($product) use ($query, $category) {
                $matchesQuery = empty($query) ||
                    stripos($product['title'], $query) !== false ||
                    stripos($product['description'], $query) !== false;

                $matchesCategory = empty($category) ||
                    strtolower($product['category']) === strtolower($category);

                return $matchesQuery && $matchesCategory;
            })->values()->toArray();
        } else {
            $products = [];
        }

        return view('shop', compact('products', 'query', 'category'));
    }
}
