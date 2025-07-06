<x-admin-layout>
    <x-slot name="header">
        Pengaturan Website
    </x-slot>

    <div class="p-6 bg-white border-b border-gray-200">
        <form method="POST" action="{{ route('admin.settings.update') }}">
            @csrf
            <div class="space-y-4">
                <div>
                    <label for="whatsapp_number" class="block font-medium text-sm text-gray-700">Nomor WhatsApp Admin (untuk Checkout)</label>
                    <input id="whatsapp_number" class="block mt-1 w-full md:w-1/2 rounded-md shadow-sm border-gray-300" type="text" name="whatsapp_number" value="{{ old('whatsapp_number', $settings['whatsapp_number']->value ?? env('ADMIN_WHATSAPP_NUMBER')) }}" required />
                    <p class="text-xs text-gray-500 mt-1">Gunakan format internasional, contoh: 6281234567890.</p>
                    @error('whatsapp_number')
                        <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Tambahkan pengaturan lain di sini jika perlu --}}
            </div>

            <div class="flex items-center justify-start mt-6">
                <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">
                    Simpan Pengaturan
                </button>
            </div>
        </form>
    </div>
</x-admin-layout>