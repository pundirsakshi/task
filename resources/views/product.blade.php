<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $product['title'] }} - {{ config('app.name', 'Laravel') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] min-h-screen">
    @include('layout.header')

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Breadcrumb -->
        <nav class="mb-8">
            <ol class="flex items-center space-x-2 text-sm text-[#706f6c] dark:text-[#A1A09A]">
                <li><a href="{{ route('shop') }}" class="hover:text-[#f53003] dark:hover:text-[#FF4433]">Shop</a></li>
                <li class="flex items-center">
                    <svg class="w-4 h-4 mx-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span>{{ ucfirst($product['category']) }}</span>
                </li>
                <li class="flex items-center">
                    <svg class="w-4 h-4 mx-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="truncate">{{ $product['title'] }}</span>
                </li>
            </ol>
        </nav>

        <!-- Product Details -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Product Image -->
            <div
                class="bg-white dark:bg-[#161615] rounded-lg shadow-sm border border-[#e3e3e0] dark:border-[#3E3E3A] overflow-hidden">
                <img src="{{ $product['image'] }}" alt="{{ $product['title'] }}"
                    class="w-full h-96 lg:h-[500px] object-cover">
            </div>

            <!-- Product Info -->
            <div
                class="bg-white dark:bg-[#161615] rounded-lg shadow-sm border border-[#e3e3e0] dark:border-[#3E3E3A] p-6">
                <div class="mb-4">
                    <span class="inline-block px-3 py-1 text-sm font-medium bg-[#f53003] text-white rounded-full">
                        {{ ucfirst($product['category']) }}
                    </span>
                </div>

                <h1 class="text-3xl font-bold text-[#1b1b18] dark:text-[#EDEDEC] mb-4">
                    {{ $product['title'] }}
                </h1>

                <!-- Rating -->
                <div class="flex items-center mb-4">
                    @for ($i = 1; $i <= 5; $i++)
                        @if ($i <= floor($product['rating']['rate']))
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                        @else
                            <svg class="w-5 h-5 text-gray-300 dark:text-gray-600" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                        @endif
                    @endfor
                    <span class="ml-2 text-[#706f6c] dark:text-[#A1A09A]">
                        {{ $product['rating']['rate'] }} ({{ $product['rating']['count'] }} reviews)
                    </span>
                </div>

                <!-- Price -->
                <div class="text-4xl font-bold text-[#f53003] dark:text-[#FF4433] mb-6">
                    ${{ number_format($product['price'], 2) }}
                </div>

                <!-- Description -->
                <div class="mb-6">
                    <h3 class="text-lg font-semibold text-[#1b1b18] dark:text-[#EDEDEC] mb-2">Description</h3>
                    <p class="text-[#706f6c] dark:text-[#A1A09A] leading-relaxed">
                        {{ $product['description'] }}
                    </p>
                </div>

                <!-- Actions -->
                <div class="flex flex-col sm:flex-row gap-4">
                    <button
                        class="flex-1 px-6 py-3 bg-[#f53003] text-white rounded-lg hover:bg-[#d42a02] transition-colors duration-200 font-medium text-lg">
                        Add to Cart
                    </button>
                    <button
                        class="flex-1 px-6 py-3 border border-[#f53003] text-[#f53003] dark:text-[#FF4433] rounded-lg hover:bg-[#f53003] hover:text-white transition-colors duration-200 font-medium text-lg">
                        Buy Now
                    </button>
                </div>

                <!-- Additional Info -->
                <div class="mt-8 pt-6 border-t border-[#e3e3e0] dark:border-[#3E3E3A]">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm">
                        <div>
                            <span class="font-medium text-[#1b1b18] dark:text-[#EDEDEC]">Product ID:</span>
                            <span class="text-[#706f6c] dark:text-[#A1A09A] ml-2">#{{ $product['id'] }}</span>
                        </div>
                        <div>
                            <span class="font-medium text-[#1b1b18] dark:text-[#EDEDEC]">Category:</span>
                            <span
                                class="text-[#706f6c] dark:text-[#A1A09A] ml-2">{{ ucfirst($product['category']) }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Back to Shop -->
        <div class="mt-8 text-center">
            <a href="{{ route('shop') }}"
                class="inline-flex items-center px-6 py-3 border border-[#e3e3e0] dark:border-[#3E3E3A] text-[#1b1b18] dark:text-[#EDEDEC] rounded-lg hover:bg-[#f8f9fa] dark:hover:bg-[#2a2a28] transition-colors duration-200">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Back to Shop
            </a>
        </div>
    </div>
</body>

</html>
