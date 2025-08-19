<x-admin-layout>
    <x-slot name="header">
        Tambah Produk Baru
    </x-slot>

    <div class="p-6 bg-gray-100">
        {{-- Form ini menggunakan method POST dan route('admin.products.store') --}}
        <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
            @csrf

            {{-- Memanggil form partial yang berisi semua input --}}
            @include('admin.products.partials.form')
        </form>
    </div>
</x-admin-layout>
