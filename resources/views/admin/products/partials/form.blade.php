{{-- Menampilkan error validasi umum --}}
@if ($errors->any())
    <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Oops!</strong>
        <span class="block sm:inline">Ada beberapa masalah dengan input Anda.</span>
        <ul class="list-disc list-inside">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    {{-- Kolom Kiri (2/3) --}}
    <div class="md:col-span-2 space-y-6">
        <div class="bg-white p-6 rounded-lg shadow">
            <h3 class="text-lg font-semibold border-b pb-2 mb-4">Informasi Dasar</h3>
            <!-- Name, Category, Price, Description -->
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
                <textarea id="description" name="description" rows="6" class="block mt-1 w-full rounded-md shadow-sm border-gray-300">{{ old('description', $product->description ?? '') }}</textarea>
            </div>
        </div>

        <div class="bg-white p-6 rounded-lg shadow">
            <h3 class="text-lg font-semibold border-b pb-2 mb-4">Galeri Media (Gambar & Video)</h3>
            <!-- Input untuk upload file baru -->
            <div>
                <label for="media_files" class="block font-medium text-sm text-gray-700">Tambah Media Baru</label>
                <input id="media_files" type="file" name="media_files[]" multiple class="block mt-1 w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                <p class="text-xs text-gray-500 mt-1">Anda bisa memilih banyak file (JPG, PNG, MP4, dll). Maks 20MB per file.</p>
            </div>
            
            <!-- Menampilkan media yang sudah ada -->
            @if (isset($product) && $product->media->isNotEmpty())
                <div class="mt-6">
                    <h4 class="font-medium text-sm text-gray-700 mb-2">Media Saat Ini:</h4>
                    <div class="grid grid-cols-3 sm:grid-cols-4 md:grid-cols-5 gap-4">
                        @foreach ($product->media as $media)
                            <div class="relative group">
                                @if ($media->media_type === 'image')
                                    <img src="{{ asset('storage/' . $media->file_path) }}" class="w-full h-24 object-cover rounded-md">
                                @else
                                    <div class="w-full h-24 bg-gray-800 rounded-md flex items-center justify-center">
                                        <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20"><path d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z"></path></svg>
                                    </div>
                                @endif
                                <!-- Tombol Hapus untuk setiap media -->
                                <form action="{{ route('admin.products.media.destroy', $media) }}" method="POST" onsubmit="return confirm('Anda yakin ingin menghapus media ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="absolute top-1 right-1 bg-red-600 text-white rounded-full p-1 opacity-0 group-hover:opacity-100 transition-opacity">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                                    </button>
                                </form>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>

    {{-- Kolom Kanan (1/3) --}}
    <div class="md:col-span-1 space-y-6">
        <div class="bg-white p-6 rounded-lg shadow">
            <h3 class="text-lg font-semibold border-b pb-2 mb-4">Detail & Varian</h3>
            <!-- Material, Finishing, Sizes -->
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
        </div>
        <div class="bg-white p-6 rounded-lg shadow">
            <h3 class="text-lg font-semibold border-b pb-2 mb-4">Aksi</h3>
            <div class="flex items-center justify-end">
                <a href="{{ route('admin.products.index') }}" class="text-sm text-gray-600 hover:text-gray-900 mr-4">Batal</a>
                <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">
                    {{ isset($product) ? 'Perbarui Produk' : 'Simpan Produk' }}
                </button>
            </div>
        </div>
    </div>
</div>
