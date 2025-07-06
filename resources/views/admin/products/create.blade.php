<x-admin-layout>
    <x-slot name="header">
        Tambah Produk Baru
    </x-slot>
    <div class="p-6 bg-white border-b border-gray-200">
        {{-- Form untuk Create --}}
        <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
            @csrf
            @include('admin.products.partials.form')
        </form>
    </div>
</x-admin-layout>