<x-app-layout>

    <x-slot name="title">Keranjang Belanja</x-slot>


    <div class="bg-background">
        <div class="container mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-16">
            <h1 class="text-3xl font-bold tracking-tight text-dark mb-10">Keranjang Belanja Anda</h1>

            <div class="lg:grid lg:grid-cols-12 lg:gap-x-12 lg:items-start xl:gap-x-16">
                <section aria-labelledby="cart-heading" class="lg:col-span-7 bg-white p-6 rounded-lg shadow-sm">
                    <h2 id="cart-heading" class="sr-only">Items in your shopping cart</h2>

                    <ul role="list" class="divide-y divide-gray-200">
                        @forelse ($cartItems as $item)
                            <li class="flex py-6">
                                <div class="flex-shrink-0">
                                    <img src="{{ $item->variant->product->image_path ? asset('storage/' . $item->variant->product->image_path) : 'https://placehold.co/400x400/F9F9F7/333333?text=Kana+Tojong' }}" 
                                         alt="{{ $item->variant->product->name }}" 
                                         class="w-24 h-24 rounded-md object-center object-cover sm:w-32 sm:h-32">
                                </div>

                                <div class="ml-4 flex-1 flex flex-col justify-between sm:ml-6">
                                    <div>
                                        <div class="flex justify-between font-medium text-dark">
                                            <h3>
                                                <a href="{{ route('shop.show', $item->variant->product) }}">{{ $item->variant->product->name }}</a>
                                            </h3>
                                            <p class="ml-4">Rp{{ number_format($item->variant->product->price, 0, ',', '.') }}</p>
                                        </div>
                                        <p class="mt-1 text-sm text-secondary">{{ $item->variant->size->size_number }} ({{ $item->variant->size->head_circumference_cm }} cm)</p>
                                    </div>
                                    <div class="flex-1 flex items-end justify-between text-sm">
                                        <!-- Form untuk Update Quantity -->
                                        <form action="{{ route('cart.update', $item) }}" method="POST" class="flex items-center">
                                            @csrf
                                            @method('PATCH')
                                            <label for="quantity-{{ $item->id }}" class="mr-2 text-secondary">Jumlah:</label>
                                            <input type="number" id="quantity-{{ $item->id }}" name="quantity" value="{{ $item->quantity }}" min="1" 
                                                   class="w-16 rounded-md border-gray-300 shadow-sm focus:border-primary-yellow focus:ring-primary-yellow sm:text-sm"
                                                   onchange="this.form.submit()">
                                        </form>

                                        <!-- Form untuk Hapus Item -->
                                        <div class="flex">
                                            <form action="{{ route('cart.destroy', $item) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="font-medium text-gold hover:text-dark">Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @empty
                            <li class="py-10 text-center">
                                <p class="text-secondary">Keranjang belanja Anda kosong.</p>
                                <a href="{{ route('shop.index') }}" class="mt-4 inline-block text-gold hover:text-dark font-medium">
                                    Mulai Belanja &rarr;
                                </a>
                            </li>
                        @endforelse
                    </ul>
                </section>

                <!-- Ringkasan Pesanan (Kolom Kanan) -->
                @if ($cartItems->isNotEmpty())
                    <section aria-labelledby="summary-heading" class="mt-16 bg-white rounded-lg shadow-sm px-4 py-6 sm:p-6 lg:p-8 lg:mt-0 lg:col-span-5">
                        <h2 id="summary-heading" class="text-lg font-medium text-dark">Ringkasan Pesanan</h2>

                        <dl class="mt-6 space-y-4">
                            <div class="flex items-center justify-between border-t border-gray-200 pt-4">
                                <dt class="text-base font-medium text-dark">Total Pesanan</dt>
                                <dd class="text-base font-medium text-dark">Rp{{ number_format($totalPrice, 0, ',', '.') }}</dd>
                            </div>
                        </dl>

                        <div class="mt-6">
                            <form action="{{ route('checkout.whatsapp') }}" method="POST">
                                @csrf
                                <button type="submit" class="w-full bg-gold border border-transparent rounded-md shadow-sm py-3 px-4 text-base font-medium text-white hover:bg-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 focus:ring-gold transition-colors duration-300">
                                    Checkout via WhatsApp
                                </button>
                            </form>
                        </div>
                    </section>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
