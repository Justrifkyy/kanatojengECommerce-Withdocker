<x-app-layout>

    <x-slot name="title">Profil Saya</x-slot>


    <x-slot name="header">
        <h2 class="font-semibold text-xl text-dark leading-tight">
            {{ __('Profil Saya') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            {{-- Form Edit Informasi Profil --}}
            <div class="p-4 sm:p-8 bg-white shadow-sm sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            {{-- Form Update Password --}}
            <div class="p-4 sm:p-8 bg-white shadow-sm sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            {{-- Bagian Baru: Riwayat Pesanan --}}
            <div class="p-4 sm:p-8 bg-white shadow-sm sm:rounded-lg">
                <h2 class="text-lg font-medium text-dark">
                    Riwayat Pesanan Anda
                </h2>
                <p class="mt-1 text-sm text-secondary">
                    Berikut adalah daftar semua pesanan yang pernah Anda buat.
                </p>

                <div class="mt-6 space-y-6">
                    @forelse ($orders as $order)
                        <div class="border rounded-lg p-4">
                            <div class="flex flex-wrap justify-between items-start gap-4">
                                <div>
                                    <h3 class="font-semibold text-dark">Pesanan #{{ $order->id }}</h3>
                                    <p class="text-sm text-secondary">Tanggal: {{ $order->order_date->format('d F Y') }}</p>
                                    <p class="text-sm text-secondary">Total: <span class="font-medium text-dark">Rp{{ number_format($order->total_amount, 0, ',', '.') }}</span></p>
                                </div>
                                <div class="text-sm">
                                    <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full 
                                        @if($order->status == 'Baru') bg-blue-100 text-blue-800 @endif
                                        @if($order->status == 'Dalam Proses') bg-yellow-100 text-yellow-800 @endif
                                        @if($order->status == 'Dikirim') bg-green-100 text-green-800 @endif
                                        @if($order->status == 'Selesai') bg-gray-200 text-gray-800 @endif
                                        @if($order->status == 'Dibatalkan') bg-red-100 text-red-800 @endif
                                    ">
                                        Status: {{ $order->status }}
                                    </span>
                                </div>
                            </div>
                            <div class="mt-4 border-t pt-4">
                                <h4 class="font-medium text-sm text-dark mb-2">Detail Item:</h4>
                                <ul class="list-disc list-inside text-sm text-secondary space-y-1">
                                    @foreach ($order->items as $item)
                                        <li>{{ $item->quantity }}x {{ $item->product_name }} ({{ $item->size_info }})</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @empty
                        <p class="text-center text-secondary">Anda belum memiliki riwayat pesanan.</p>
                    @endforelse
                </div>

                {{-- Link Paginasi --}}
                <div class="mt-6">
                    {{ $orders->links() }}
                </div>
            </div>

            {{-- Form Hapus Akun --}}
            <div class="p-4 sm:p-8 bg-white shadow-sm sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
