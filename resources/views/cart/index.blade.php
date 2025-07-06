<x-app-layout>
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <h1 class="text-3xl font-bold tracking-tight text-gray-900 mb-8">Keranjang Belanja Anda</h1>

        <div class="lg:grid lg:grid-cols-12 lg:gap-x-12 lg:items-start xl:gap-x-16">
            <section aria-labelledby="cart-heading" class="lg:col-span-7">
                <h2 id="cart-heading" class="sr-only">Items in your shopping cart</h2>

                <ul role="list" class="border-t border-b border-gray-200 divide-y divide-gray-200">
                    @forelse ($cartItems as $item)
                        <li class="flex py-6 sm:py-10">
                            <div class="flex-shrink-0">
                                <img src="{{ asset('storage/' . $item->variant->product->image_path) }}" alt="{{ $item->variant->product->name }}" class="w-24 h-24 rounded-md object-center object-cover sm:w-48 sm:h-48">
                            </div>

                            <div class="ml-4 flex-1 flex flex-col justify-between sm:ml-6">
                                <div class="relative pr-9 sm:grid sm:grid-cols-2 sm:gap-x-6 sm:pr-0">
                                    <div>
                                        <div class="flex justify-between">
                                            <h3 class="text-sm">
                                                <a href="{{ route('shop.show', $item->variant->product) }}" class="font-medium text-gray-700 hover:text-gray-800">{{ $item->variant->product->name }}</a>
                                            </h3>
                                        </div>
                                        <div class="mt-1 flex text-sm">
                                            <p class="text-gray-500">{{ $item->variant->size->size_number }} ({{ $item->variant->size->head_circumference_cm }} cm)</p>
                                        </div>
                                        <p class="mt-1 text-sm font-medium text-gray-900">Rp{{ number_format($item->variant->product->price, 0, ',', '.') }}</p>
                                    </div>

                                    <div class="mt-4 sm:mt-0 sm:pr-9">
                                        <label for="quantity-{{ $item->id }}" class="sr-only">Quantity</label>
                                        {{-- Untuk saat ini kita tampilkan saja, update quantity akan jadi fitur tambahan --}}
                                        <input type="number" value="{{ $item->quantity }}" disabled class="w-20 rounded-md border-gray-300 py-1.5 text-base leading-5 font-medium text-gray-700 text-left shadow-sm focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">

                                        <div class="absolute top-0 right-0">
                                            <form action="{{ route('cart.destroy', $item) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="inline-flex p-2 text-gray-400 hover:text-gray-500">
                                                    <span class="sr-only">Remove</span>
                                                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @empty
                        <li class="py-10 text-center">
                            <p class="text-gray-500">Keranjang belanja Anda kosong.</p>
                            <a href="{{ route('shop') }}" class="mt-4 inline-block text-indigo-600 hover:text-indigo-500 font-medium">Mulai Belanja &rarr;</a>
                        </li>
                    @endforelse
                </ul>
            </section>

            @if ($cartItems->isNotEmpty())
                <section aria-labelledby="summary-heading" class="mt-16 bg-gray-50 rounded-lg px-4 py-6 sm:p-6 lg:p-8 lg:mt-0 lg:col-span-5">
                    <h2 id="summary-heading" class="text-lg font-medium text-gray-900">Ringkasan Pesanan</h2>

                    <dl class="mt-6 space-y-4">
                        <div class="flex items-center justify-between border-t border-gray-200 pt-4">
                            <dt class="text-base font-medium text-gray-900">Total Pesanan</dt>
                            <dd class="text-base font-medium text-gray-900">Rp{{ number_format($totalPrice, 0, ',', '.') }}</dd>
                        </div>
                    </dl>

                    <div class="mt-6">
                        <form action="{{ route('checkout.whatsapp') }}" method="POST">
                            @csrf
                            <button type="submit" class="w-full bg-green-600 border border-transparent rounded-md shadow-sm py-3 px-4 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 focus:ring-green-500">
                                Checkout via WhatsApp
                            </button>
                        </form>
                    </div>
                </section>
            @endif
        </div>
    </div>
</x-app-layout>