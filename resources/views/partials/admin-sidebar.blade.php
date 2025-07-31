<aside class="w-64 bg-gray-800 text-white flex-shrink-0">
    <div class="p-6">
        <a href="{{ route('admin.dashboard') }}" class="text-2xl font-bold">Admin Kana Tojeng</a>
    </div>
    <nav class="mt-6">
        <a href="{{ route('admin.dashboard') }}" class="block py-2.5 px-6 text-gray-300 hover:bg-gray-700 hover:text-white">Dashboard</a>
        <a href="{{ route('admin.products.index') }}" class="block py-2.5 px-6 text-gray-300 hover:bg-gray-700 hover:text-white">Produk</a>
        <a href="{{ route('admin.categories.index') }}" class="block py-2.5 px-6 text-gray-300 hover:bg-gray-700 hover:text-white">Kategori</a>
        <a href="{{ route('admin.orders.index') }}" class="block py-2.5 px-6 text-gray-300 hover:bg-gray-700 hover:text-white">Pesanan</a>
        <a href="{{ route('admin.users.index') }}" class="block py-2.5 px-6 text-gray-300 hover:bg-gray-700 hover:text-white">Pengguna</a>
        <a href="{{ route('home') }}" class="block py-2.5 px-6 text-gray-300 hover:bg-gray-700 hover:text-white border-t border-gray-700 mt-4">Kembali ke Situs</a>
         <form method="POST" action="{{ route('logout') }}">
            @csrf
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" class="block py-2.5 px-6 text-gray-300 hover:bg-gray-700 hover:text-white">
                Logout
            </a>
        </form>
    </nav>
</aside>