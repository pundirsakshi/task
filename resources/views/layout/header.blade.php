<header
    class="w-full bg-white dark:bg-[#161615] shadow-sm border-b border-[#e3e3e0] dark:border-[#3E3E3A] sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">

            <!-- Left: Logo -->
            <div class="flex-shrink-0">
                <a href="/" class="text-2xl font-bold text-[#1b1b18] dark:text-[#EDEDEC]">
                    Brand
                </a>
            </div>

            <!-- Center: Main Navigation -->
            <nav class="hidden md:flex items-center space-x-8">
                <a href="{{ route('shop') }}"
                    class="text-[#1b1b18] dark:text-[#EDEDEC] hover:text-[#f53003] dark:hover:text-[#FF4433] transition-colors duration-200 font-medium">
                    Shop
                </a>
                <a href="{{ route('about') }}"
                    class="text-[#1b1b18] dark:text-[#EDEDEC] hover:text-[#f53003] dark:hover:text-[#FF4433] transition-colors duration-200 font-medium">
                    About
                </a>
                <a href="{{ route('giving') }}"
                    class="text-[#1b1b18] dark:text-[#EDEDEC] hover:text-[#f53003] dark:hover:text-[#FF4433] transition-colors duration-200 font-medium">
                    Giving
                </a>
                <a href="{{ route('proud') }}"
                    class="text-[#1b1b18] dark:text-[#EDEDEC] hover:text-[#f53003] dark:hover:text-[#FF4433] transition-colors duration-200 font-medium">
                    Proud
                </a>
                <a href="{{ route('pro-collection') }}"
                    class="text-[#1b1b18] dark:text-[#EDEDEC] hover:text-[#f53003] dark:hover:text-[#FF4433] transition-colors duration-200 font-medium">
                    Pro Collection
                </a>
            </nav>

            <!-- Right: Search & Cart -->
            <div class="flex items-center space-x-4">
                <!-- Search -->
                <form action="{{ route('shop.search') }}" method="GET" class="relative">
                    <input type="search" name="q" placeholder="Search products..."
                        class="w-64 px-4 py-2 text-sm border border-[#e3e3e0] dark:border-[#3E3E3A] rounded-lg bg-white dark:bg-[#2a2a28] text-[#1b1b18] dark:text-[#EDEDEC] focus:outline-none focus:ring-2 focus:ring-[#f53003] focus:border-transparent">
                    <button type="submit"
                        class="absolute right-2 top-1/2 transform -translate-y-1/2 text-[#1b1b18] dark:text-[#EDEDEC] hover:text-[#f53003] dark:hover:text-[#FF4433]">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </button>
                </form>

                <!-- Cart -->
                <a href="{{ route('cart') }}"
                    class="relative p-2 text-[#1b1b18] dark:text-[#EDEDEC] hover:text-[#f53003] dark:hover:text-[#FF4433] transition-colors duration-200">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-2.5 5M7 13l2.5 5m6-5v6a2 2 0 01-2 2H9a2 2 0 01-2-2v-6m8 0V9a2 2 0 00-2-2H9a2 2 0 00-2 2v4.01">
                        </path>
                    </svg>
                    <span
                        class="absolute -top-1 -right-1 bg-[#f53003] text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">
                        2
                    </span>
                </a>
            </div>

            <!-- Mobile menu button -->
            <div class="md:hidden">
                <button type="button"
                    class="text-[#1b1b18] dark:text-[#EDEDEC] hover:text-[#f53003] dark:hover:text-[#FF4433] focus:outline-none focus:text-[#f53003] dark:focus:text-[#FF4433]">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</header>
