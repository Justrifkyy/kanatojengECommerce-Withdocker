<x-admin-layout>
    <x-slot name="header">
        Tambah Kategori Baru
    </x-slot>
    <div class="p-6 bg-white border-b border-gray-200">
        <form method="POST" action="{{ route('admin.categories.store') }}">
            @csrf
            <div>
                <label for="name" class="block font-medium text-sm text-gray-700">Nama Kategori</label>
                <input id="name" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" name="name" value="{{ old('name') }}" required autofocus />
                @error('name')
                    <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-end mt-4">
                <a href="{{ route('admin.categories.index') }}" class="text-sm text-gray-600 hover:text-gray-900 mr-4">Batal</a>
                <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</x-admin-layout>