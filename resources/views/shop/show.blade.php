<x-app-layout>
    <div class="bg-white">
        <div class="pt-6">
            <div class="max-w-2xl mx-auto sm:px-6 lg:max-w-7xl lg:px-8 lg:grid lg:grid-cols-3 lg:gap-x-8">
                <div class="aspect-w-4 aspect-h-5 sm:rounded-lg sm:overflow-hidden lg:aspect-w-3 lg:aspect-h-4">
                    <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}" class="w-full h-full object-center object-cover">
                </div>
            </div>

            <div class="max-w-2xl mx-auto pt-10 pb-16 px-4 sm:px-6 lg:max-w-7xl lg:pt-16 lg:pb-24 lg:px-8 lg:grid lg:grid-cols-3 lg:grid-rows-[auto,auto,1fr] lg:gap-x-8">
                <div class="lg:col-span-2 lg:border-r lg:border-gray-200 lg:pr-8">
                    <h1 class="text-2xl font-extrabold tracking-tight text-gray-900 sm:text-3xl">{{ $product->name }}</h1>
                    <p class="text-sm text-gray-500 mt-1">{{ $product->category->name }}</p>
                </div>

                <div class="mt-4 lg:mt-0 lg:row-span-3">
                    <h2 class="sr-only">Product information</h2>
                    <p class="text-3xl text-gray-900">Rp{{ number_format($product->price, 0, ',', '.') }}</p>

                    <form method="POST" action="{{ route('cart.store') }}" class="mt-10">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">

                        <div class="mt-10">
                            <div class="flex items-center justify-between">
                                <h3 class="text-sm text-gray-900 font-medium">Ukuran</h3>
                            </div>
                            
                            @error('size_id')
                                <p class="text-red-500 text-xs mt-1">Silakan pilih ukuran terlebih dahulu.</p>
                            @enderror

                            <fieldset class="mt-4">
                                <legend class="sr-only">Pilih ukuran</legend>
                                <div class="grid grid-cols-4 gap-4 sm:grid-cols-8 lg:grid-cols-4">
                                    @forelse ($product->sizes as $size)
                                        <div>
                                            {{-- Tambahkan class 'peer' pada input --}}
                                            <input type="radio" id="size-choice-{{ $size->id }}" name="size_id" value="{{ $size->id }}" class="sr-only peer">
                                            
                                            {{-- Gunakan 'peer-checked' untuk mengubah style label --}}
                                            <label for="size-choice-{{ $size->id }}" class="group relative border rounded-md py-3 px-4 flex items-center justify-center text-sm font-medium uppercase bg-white text-gray-900 hover:bg-gray-50 focus:outline-none cursor-pointer peer-checked:bg-indigo-600 peer-checked:text-white peer-checked:border-transparent">
                                                {{ $size->size_number }}
                                            </label>
                                        </div>
                                    @empty
                                        <p class="text-sm text-gray-500 col-span-full">Ukuran tidak tersedia.</p>
                                    @endforelse
                                </div>
                            </fieldset>
                        </div>

                        {{-- Pastikan tombol ini tidak di-disable jika ada ukuran --}}
                        <button type="submit" 
                                class="mt-10 w-full bg-indigo-600 border border-transparent rounded-md py-3 px-8 flex items-center justify-center text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 disabled:bg-gray-400 disabled:cursor-not-allowed" 
                                @if($product->sizes->isEmpty()) disabled @endif>
                            Tambah ke Keranjang
                        </button>
                    </form>
                </div>

                <div class="py-10 lg:pt-6 lg:pb-16 lg:col-start-1 lg:col-span-2 lg:border-r lg:border-gray-200 lg:pr-8">
                    <div>
                        <h3 class="sr-only">Deskripsi</h3>
                        <div class="space-y-6">
                            <p class="text-base text-gray-900">{{ $product->description }}</p>
                        </div>
                    </div>

                    <div class="mt-10">
                        <h3 class="text-sm font-medium text-gray-900">Detail</h3>
                        <div class="mt-4">
                            <ul role="list" class="pl-4 list-disc text-sm space-y-2">
                                <li class="text-gray-400"><span class="text-gray-600">Material: {{ $product->material }}</span></li>
                                <li class="text-gray-400"><span class="text-gray-600">Finishing: {{ $product->finishing }}</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>