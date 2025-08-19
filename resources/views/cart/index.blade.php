<x-app-layout>
    <x-slot name="title">Keranjang Belanja</x-slot>

    <!-- Header Halaman -->
    <section class="bg-surface">
        <div class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl font-extrabold text-secondary tracking-tight">Keranjang Belanja</h1>
            <p class="mt-4 text-lg text-light max-w-2xl mx-auto">Periksa kembali pesanan Anda sebelum melanjutkan ke proses selanjutnya.</p>
        </div>
    </section>

    <!-- Konten Utama Keranjang -->
    <div class="bg-background">
        <div x-data="{
                totalPrice: '{{ 'Rp' . number_format($totalPrice, 0, ',', '.') }}',
                updateQuantity(form) {
                    let formData = new FormData(form);
                    formData.append('_method', 'PATCH');

                    fetch(form.action, {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if(data.success) {
                            this.totalPrice = data.totalPriceFormatted;
                            $store.app.updateCartCount(data.cartCount);
                            $store.app.showToast(data.message);
                        } else {
                            $store.app.showToast(data.message || 'Gagal memperbarui keranjang.', 'error');
                        }
                    })
                    .catch(() => {
                        $store.app.showToast('Terjadi kesalahan koneksi.', 'error');
                    });
                }
            }" 
             class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:px-8">
            
            @if ($cartItems->isNotEmpty())
                <div class="lg:grid lg:grid-cols-12 lg:gap-x-12 lg:items-start xl:gap-x-16">
                    <!-- Daftar Item (Kolom Kiri) -->
                    <section aria-labelledby="cart-heading" class="lg:col-span-8">
                        <table class="min-w-full">
                            <thead class="bg-surface h-16">
                                <tr>
                                    <th scope="col" class="text-left text-secondary font-medium px-6">Produk</th>
                                    <th scope="col" class="text-left text-secondary font-medium px-6">Harga</th>
                                    <th scope="col" class="text-left text-secondary font-medium px-6">Jumlah</th>
                                    <th scope="col" class="text-left text-secondary font-medium px-6">Subtotal</th>
                                    <th scope="col" class="relative px-6"><span class="sr-only">Hapus</span></th>
                                </tr>
                            </thead>
                            <tbody class="bg-white">
                                @foreach ($cartItems as $item)
                                    <tr class="border-b">
                                        <!-- Produk -->
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 h-16 w-16">
                                                    <img class="h-16 w-16 rounded-md object-cover" src="{{ $item->variant->product->media->first() ? asset('storage/' . $item->variant->product->media->first()->file_path) : 'https://placehold.co/100x100/f3f4f6/333333?text=Produk' }}" alt="{{ $item->variant->product->name }}">
                                                </div>
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium text-secondary">{{ $item->variant->product->name }}</div>
                                                    <div class="text-sm text-light">{{ $item->variant->size->size_number }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <!-- Harga -->
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-light">
                                            Rp{{ number_format($item->variant->product->price, 0, ',', '.') }}
                                        </td>
                                        <!-- Jumlah -->
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-light">
                                            <form action="{{ route('cart.update', $item) }}" @change.debounce.750ms="updateQuantity($el)">
                                                @csrf
                                                <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" class="w-20 rounded-md border-gray-300 text-center focus:ring-primary focus:border-primary">
                                            </form>
                                        </td>
                                        <!-- Subtotal -->
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-secondary font-medium">
                                            Rp{{ number_format($item->variant->product->price * $item->quantity, 0, ',', '.') }}
                                        </td>
                                        <!-- Hapus -->
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <form action="{{ route('cart.destroy', $item) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-primary hover:text-danger">
                                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </section>

                    <!-- Ringkasan Total (Kolom Kanan) -->
                    <section aria-labelledby="summary-heading" class="mt-16 bg-surface rounded-lg px-4 py-6 sm:p-6 lg:p-8 lg:mt-0 lg:col-span-4">
                        <h2 id="summary-heading" class="text-2xl font-bold text-secondary text-center">Cart Totals</h2>

                        <dl class="mt-6 space-y-4">
                            <div class="flex items-center justify-between">
                                <dt class="text-sm text-secondary">Subtotal</dt>
                                <dd x-text="totalPrice" class="text-sm font-medium text-light"></dd>
                            </div>
                            <div class="border-t border-gray-200 pt-4 flex items-center justify-between">
                                <dt class="text-base font-medium text-secondary">Total</dt>
                                <dd x-text="totalPrice" class="text-xl font-bold text-primary"></dd>
                            </div>
                        </dl>

                        <div class="mt-6">
                            <form action="{{ route('checkout.whatsapp') }}" method="POST" x-data="{ isLoading: false }" @submit="isLoading = true">
                                @csrf
                                <button type="submit" 
                                        :disabled="isLoading"
                                        :class="{ 'opacity-75 cursor-wait': isLoading }"
                                        class="w-full bg-transparent text-primary font-semibold py-3 px-8 border-2 border-primary rounded-lg hover:bg-primary hover:text-white transition-colors duration-300 flex items-center justify-center">
                                    <span x-show="!isLoading">Check Out</span>
                                    <span x-show="isLoading" class="flex items-center">
                                        <svg class="animate-spin -ml-1 mr-3 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                        </svg>
                                        Memproses...
                                    </span>
                                </button>
                            </form>
                        </div>
                    </section>
                </div>
            @else
                {{-- Tampilan jika keranjang kosong --}}
                <div class="text-center py-16">
                    <p class="text-lg text-light">Keranjang belanja Anda kosong.</p>
                    <a href="{{ route('shop.index') }}" class="mt-8 inline-block bg-primary text-white font-bold py-3 px-10 rounded-lg hover:bg-secondary transition-colors duration-300">
                        Mulai Belanja
                    </a>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
