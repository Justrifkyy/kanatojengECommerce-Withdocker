<!-- Modern Admin Sidebar -->
<aside class="w-64 bg-gradient-to-b from-gray-900 via-gray-800 to-gray-900 text-white flex-shrink-0 shadow-2xl border-r border-gray-700/50">
    <!-- Header Section -->
    <div class="p-6 border-b border-gray-700/50">
        <a href="{{ route('admin.dashboard') }}" class="group block">
            <h1 class="text-2xl font-bold bg-gradient-to-r from-blue-400 to-purple-500 bg-clip-text text-transparent group-hover:from-blue-300 group-hover:to-purple-400 transition-all duration-300">
                Admin Kana Tojeng
            </h1>
            <p class="text-xs text-gray-400 mt-1 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                Dashboard Panel
            </p>
        </a>
    </div>

    <!-- Navigation Section -->
    <nav class="mt-2 px-3 space-y-1">
        <!-- Dashboard -->
        <a href="{{ route('admin.dashboard') }}" 
           class="group flex items-center py-3 px-4 text-gray-300 hover:bg-gradient-to-r hover:from-blue-600/20 hover:to-purple-600/20 hover:text-white rounded-lg transition-all duration-300 hover:shadow-lg hover:shadow-blue-500/10 hover:translate-x-1">
            <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-blue-400 transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5a2 2 0 012-2h4a2 2 0 012 2v6H8V5z"></path>
            </svg>
            <span class="font-medium">Dashboard</span>
            <div class="ml-auto w-2 h-2 bg-blue-500 rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
        </a>

        <!-- Produk -->
        <a href="{{ route('admin.products.index') }}" 
           class="group flex items-center py-3 px-4 text-gray-300 hover:bg-gradient-to-r hover:from-green-600/20 hover:to-emerald-600/20 hover:text-white rounded-lg transition-all duration-300 hover:shadow-lg hover:shadow-green-500/10 hover:translate-x-1">
            <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-green-400 transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
            </svg>
            <span class="font-medium">Produk</span>
            <div class="ml-auto w-2 h-2 bg-green-500 rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
        </a>

        <!-- Kategori -->
        <a href="{{ route('admin.categories.index') }}" 
           class="group flex items-center py-3 px-4 text-gray-300 hover:bg-gradient-to-r hover:from-yellow-600/20 hover:to-orange-600/20 hover:text-white rounded-lg transition-all duration-300 hover:shadow-lg hover:shadow-yellow-500/10 hover:translate-x-1">
            <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-yellow-400 transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
            </svg>
            <span class="font-medium">Kategori</span>
            <div class="ml-auto w-2 h-2 bg-yellow-500 rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
        </a>

        <!-- Pesanan -->
        <a href="{{ route('admin.orders.index') }}" 
           class="group flex items-center py-3 px-4 text-gray-300 hover:bg-gradient-to-r hover:from-purple-600/20 hover:to-pink-600/20 hover:text-white rounded-lg transition-all duration-300 hover:shadow-lg hover:shadow-purple-500/10 hover:translate-x-1">
            <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-purple-400 transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
            </svg>
            <span class="font-medium">Pesanan</span>
            <div class="ml-auto w-2 h-2 bg-purple-500 rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
        </a>

        <!-- Pengguna -->
        <a href="{{ route('admin.users.index') }}" 
           class="group flex items-center py-3 px-4 text-gray-300 hover:bg-gradient-to-r hover:from-indigo-600/20 hover:to-blue-600/20 hover:text-white rounded-lg transition-all duration-300 hover:shadow-lg hover:shadow-indigo-500/10 hover:translate-x-1">
            <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-indigo-400 transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5 0A17.5 17.5 0 0015 21z"></path>
            </svg>
            <span class="font-medium">Pengguna</span>
            <div class="ml-auto w-2 h-2 bg-indigo-500 rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
        </a>

        <!-- Divider -->
        <div class="my-4 border-t border-gray-700/50"></div>

        <!-- Kembali ke Situs -->
        <a href="{{ route('home') }}" 
           class="group flex items-center py-3 px-4 text-gray-300 hover:bg-gradient-to-r hover:from-teal-600/20 hover:to-cyan-600/20 hover:text-white rounded-lg transition-all duration-300 hover:shadow-lg hover:shadow-teal-500/10 hover:translate-x-1">
            <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-teal-400 transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            <span class="font-medium">Kembali ke Situs</span>
            <div class="ml-auto w-2 h-2 bg-teal-500 rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
        </a>

        <!-- Logout -->
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <a href="{{ route('logout') }}" 
               onclick="event.preventDefault(); this.closest('form').submit();" 
               class="group flex items-center py-3 px-4 text-gray-300 hover:bg-gradient-to-r hover:from-red-600/20 hover:to-pink-600/20 hover:text-white rounded-lg transition-all duration-300 hover:shadow-lg hover:shadow-red-500/10 hover:translate-x-1">
                <svg class="w-5 h-5 mr-3 text-gray-400 group-hover:text-red-400 transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                </svg>
                <span class="font-medium">Logout</span>
                <div class="ml-auto w-2 h-2 bg-red-500 rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
            </a>
        </form>
    </nav>
</aside>