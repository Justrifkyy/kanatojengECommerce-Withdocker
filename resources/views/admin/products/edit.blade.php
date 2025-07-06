<x-admin-layout>
    <x-slot name="header">
        Edit Produk: {{ $product->name }}
    </x-slot>
    <div class="p-6 bg-white border-b border-gray-200">
        {{-- Form untuk Edit --}}
        <form method="POST" action="{{ route('admin.products.update', $product) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('admin.products.partials.form', ['product' => $product])
        </form>
    </div>
</x-admin-layout>