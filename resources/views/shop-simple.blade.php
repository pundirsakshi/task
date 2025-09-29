<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Shop - {{ config('app.name', 'Laravel') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen">
    @include('layout.header')

    <div class="max-w-7xl mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-4">Our Products</h1>
        <p class="mb-8">Products count: {{ count($products) }}</p>

        @if (count($products) > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @foreach ($products as $product)
                    <div class="bg-white rounded-lg shadow p-4">
                        <img src="{{ $product['image'] }}" alt="{{ $product['title'] }}"
                            class="w-full h-48 object-cover mb-4">
                        <h3 class="font-bold text-lg mb-2">{{ $product['title'] }}</h3>
                        <p class="text-gray-600 mb-2">{{ $product['category'] }}</p>
                        <p class="text-green-600 font-bold text-xl">${{ $product['price'] }}</p>
                        <div class="mt-4">
                            <a href="{{ route('product.show', $product['id']) }}"
                                class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                                View Details
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-red-600">No products found</p>
        @endif
    </div>
</body>

</html>
