<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] min-h-screen">
    @include('layout.header')

    <!-- Hero Section -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-[#1b1b18] dark:text-[#EDEDEC] mb-4">Welcome to Our Store</h1>
            <p class="text-xl text-[#706f6c] dark:text-[#A1A09A] mb-8">Discover amazing products and collections</p>
            <div class="flex justify-center gap-4">
                <a href="{{ route('shop') }}"
                    class="inline-block bg-[#f53003] text-white px-8 py-3 rounded-lg hover:bg-[#d42a02] transition-colors duration-200 font-medium">
                    Shop Now
                </a>
                <a href="{{ route('about') }}"
                    class="inline-block border border-[#f53003] text-[#f53003] dark:text-[#FF4433] px-8 py-3 rounded-lg hover:bg-[#f53003] hover:text-white transition-colors duration-200 font-medium">
                    About Us
                </a>
            </div>
        </div>
    </div>

    <!-- Featured Products Section -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="text-center mb-8">
            <h2 class="text-3xl font-bold text-[#1b1b18] dark:text-[#EDEDEC] mb-4">Featured Products</h2>
            <p class="text-[#706f6c] dark:text-[#A1A09A]">Check out our most popular items</p>
        </div>

        @if (isset($products) && count($products) > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @foreach ($products as $product)
                    <div
                        class="bg-white dark:bg-[#161615] rounded-lg shadow-sm border border-[#e3e3e0] dark:border-[#3E3E3A] overflow-hidden hover:shadow-lg transition-shadow duration-300 group">
                        <!-- Product Image -->
                        <div class="aspect-square overflow-hidden bg-gray-100 dark:bg-[#2a2a28]">
                            <img src="{{ $product['image'] }}" alt="{{ $product['title'] }}"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        </div>

                        <!-- Product Info -->
                        <div class="p-4">
                            <div class="mb-2">
                                <span
                                    class="inline-block px-2 py-1 text-xs font-medium bg-[#f53003] text-white rounded-full">
                                    {{ ucfirst($product['category']) }}
                                </span>
                            </div>

                            <h3 class="text-lg font-semibold text-[#1b1b18] dark:text-[#EDEDEC] mb-2 line-clamp-2">
                                {{ $product['title'] }}
                            </h3>

                            <p class="text-[#706f6c] dark:text-[#A1A09A] text-sm mb-3 line-clamp-2">
                                {{ Str::limit($product['description'], 100) }}
                            </p>

                            <!-- Rating -->
                            <div class="flex items-center mb-3">
                                @for ($i = 1; $i <= 5; $i++)
                                    @if ($i <= floor($product['rating']['rate']))
                                        <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg>
                                    @else
                                        <svg class="w-4 h-4 text-gray-300 dark:text-gray-600" fill="currentColor"
                                            viewBox="0 0 20 20">
                                            <path
                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg>
                                    @endif
                                @endfor
                                <span class="ml-2 text-sm text-[#706f6c] dark:text-[#A1A09A]">
                                    ({{ $product['rating']['count'] }})
                                </span>
                            </div>

                            <!-- Price and Actions -->
                            <div class="flex items-center justify-between">
                                <div class="text-2xl font-bold text-[#f53003] dark:text-[#FF4433]">
                                    ${{ number_format($product['price'], 2) }}
                                </div>
                                <div class="flex gap-2">
                                    <a href="{{ route('product.show', $product['id']) }}"
                                        class="px-3 py-1 text-sm bg-[#f53003] text-white rounded hover:bg-[#d42a02] transition-colors duration-200">
                                        View
                                    </a>
                                    <button
                                        class="px-3 py-1 text-sm border border-[#f53003] text-[#f53003] dark:text-[#FF4433] rounded hover:bg-[#f53003] hover:text-white transition-colors duration-200">
                                        Add to Cart
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- View All Products Button -->
            <div class="text-center mt-8">
                <a href="{{ route('shop') }}"
                    class="inline-block bg-[#f53003] text-white px-8 py-3 rounded-lg hover:bg-[#d42a02] transition-colors duration-200 font-medium">
                    View All Products
                </a>
            </div>
        @else
            <!-- No Products Found -->
            <div class="text-center py-12">
                <div class="text-6xl mb-4">🔍</div>
                <h3 class="text-xl font-semibold text-[#1b1b18] dark:text-[#EDEDEC] mb-2">No products available</h3>
                <p class="text-[#706f6c] dark:text-[#A1A09A] mb-4">Please try again later</p>
            </div>
        @endif
    </div>

    @if (Route::has('login'))
        <div class="h-14.5 hidden lg:block"></div>
    @endif
</body>

</html>
