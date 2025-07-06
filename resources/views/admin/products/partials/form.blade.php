{{-- Menampilkan error validasi umum --}}
@if ($errors->any())
    <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Oops!</strong>
        <span class="block sm:inline">Ada beberapa masalah dengan input Anda.</span>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    {{-- Kolom Kiri --}}
    <div>
        <div>
            <label for="name" class="block font-medium text-sm text-gray-700">Nama Produk</label>
            <input id="name" type="text" name="name" value="{{ old('name', $product->name ?? '') }}" required class="block mt-1 w-full rounded-md shadow-sm border-gray-300">
        </div>

        <div class="mt-4">
            <label for="category_id" class="block font-medium text-sm text-gray-700">Kategori</label>
            <select name="category_id" id="category_id" class="block mt-1 w-full rounded-md shadow-sm border-gray-300">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" @selected(old('category_id', $product->category_id ?? '') == $category->id)>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mt-4">
            <label for="price" class="block font-medium text-sm text-gray-700">Harga</label>
            <input id="price" type="number" name="price" value="{{ old('price', $product->price ?? '') }}" required class="block mt-1 w-full rounded-md shadow-sm border-gray-300">
        </div>

        <div class="mt-4">
            <label for="description" class="block font-medium text-sm text-gray-700">Deskripsi</label>
            <textarea id="description" name="description" rows="4" class="block mt-1 w-full rounded-md shadow-sm border-gray-300">{{ old('description', $product->description ?? '') }}</textarea>
        </div>
    </div>

    {{-- Kolom Kanan --}}
    <div>
        <div>
            <label for="material" class="block font-medium text-sm text-gray-700">Material</label>
            <input id="material" type="text" name="material" value="{{ old('material', $product->material ?? '') }}" class="block mt-1 w-full rounded-md shadow-sm border-gray-300">
        </div>
        
        <div class="mt-4">
            <label for="finishing" class="block font-medium text-sm text-gray-700">Finishing</label>
            <input id="finishing" type="text" name="finishing" value="{{ old('finishing', $product->finishing ?? '') }}" class="block mt-1 w-full rounded-md shadow-sm border-gray-300">
        </div>

        <div class="mt-4">
            <label class="block font-medium text-sm text-gray-700">Ukuran yang Tersedia</label>
            <div class="mt-2 grid grid-cols-3 gap-2">
                @foreach ($sizes as $size)
                    <label class="flex items-center">
                        <input type="checkbox" name="sizes[]" value="{{ $size->id }}" class="rounded border-gray-300 text-indigo-600 shadow-sm"
                            @if(isset($productSizeIds) && in_array($size->id, $productSizeIds)) checked @endif
                            @if(is_array(old('sizes')) && in_array($size->id, old('sizes'))) checked @endif
                        >
                        <span class="ml-2 text-sm text-gray-600">{{ $size->size_number }}</span>
                    </label>
                @endforeach
            </div>
        </div>

        <div class="mt-4">
            <label for="image" class="block font-medium text-sm text-gray-700">Gambar Produk</label>
            <input id="image" type="file" name="image" class="block mt-1 w-full">
             @if (isset($product) && $product->image_path)
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $product->image_path) }}" alt="Current image" class="w-32 h-32 object-cover rounded">
                    <p class="text-xs text-gray-500 mt-1">Gambar saat ini. Upload baru untuk mengganti.</p>
                </div>
            @endif
        </div>
    </div>
</div>

<div class="flex items-center justify-end mt-6">
    <a href="{{ route('admin.products.index') }}" class="text-sm text-gray-600 hover:text-gray-900 mr-4">Batal</a>
    <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">
        {{ isset($product) ? 'Perbarui' : 'Simpan' }}
    </button>
</div>