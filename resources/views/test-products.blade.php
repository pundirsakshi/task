<!DOCTYPE html>
<html>

<head>
    <title>Test Products</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 p-8">
    <h1 class="text-3xl font-bold mb-4">Test Products Page</h1>

    <div class="mb-4">
        <p>Products count: {{ count($products) }}</p>
        <p>Products variable exists: {{ isset($products) ? 'Yes' : 'No' }}</p>
    </div>

    @if (isset($products) && count($products) > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach ($products as $product)
                <div class="bg-white p-4 rounded shadow">
                    <img src="{{ $product['image'] }}" alt="{{ $product['title'] }}" class="w-full h-48 object-cover mb-2">
                    <h3 class="font-bold">{{ $product['title'] }}</h3>
                    <p class="text-green-600 font-bold">${{ $product['price'] }}</p>
                    <p class="text-sm text-gray-600">{{ $product['category'] }}</p>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-red-600">No products found or products variable is empty</p>
    @endif
</body>

</html>
