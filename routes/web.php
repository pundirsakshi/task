<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    // Fetch products for the welcome page
    $response = Http::get('https://fakestoreapi.com/products');

    if ($response->successful()) {
        $products = $response->json();
        // Limit to first 8 products for the welcome page
        $products = array_slice($products, 0, 8);
    } else {
        $products = [];
    }

    return view('welcome', compact('products'));
});

// Navigation routes
Route::get('/shop', [ProductController::class, 'index'])->name('shop');
Route::get('/shop/search', [ProductController::class, 'search'])->name('shop.search');

Route::get('/about', function () {
    return view('pages.about');
})->name('about');

Route::get('/giving', function () {
    return view('pages.giving');
})->name('giving');

Route::get('/proud', function () {
    return view('pages.proud');
})->name('proud');

Route::get('/pro-collection', function () {
    return view('pages.pro-collection');
})->name('pro-collection');

Route::get('/cart', function () {
    return view('pages.cart');
})->name('cart');

Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');

// Debug route to test products
Route::get('/debug-products', function () {
    $response = Http::get('https://fakestoreapi.com/products');
    if ($response->successful()) {
        $products = $response->json();
        return response()->json([
            'count' => count($products),
            'first_product' => $products[0] ?? null,
            'all_products' => $products
        ]);
    }
    return response()->json(['error' => 'Failed to fetch products']);
});

// Test route with simple view
Route::get('/test-products', [ProductController::class, 'index'])->name('test.products');
