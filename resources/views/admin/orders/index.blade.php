<x-admin-layout>
    <x-slot name="header">
        Manajemen Pesanan
    </x-slot>

    <div class="p-6 bg-white border-b border-gray-200">
        {{-- Tombol Filter Status --}}
        <div class="mb-4 flex space-x-2">
            <a href="{{ route('admin.orders.index') }}" class="px-3 py-1 text-sm rounded-full {{ !request('status') ? 'bg-indigo-600 text-white' : 'bg-gray-200 text-gray-700' }}">Semua</a>
            <a href="{{ route('admin.orders.index', ['status' => 'Baru']) }}" class="px-3 py-1 text-sm rounded-full {{ request('status') == 'Baru' ? 'bg-blue-500 text-white' : 'bg-gray-200 text-gray-700' }}">Baru</a>
            <a href="{{ route('admin.orders.index', ['status' => 'Dalam Proses']) }}" class="px-3 py-1 text-sm rounded-full {{ request('status') == 'Dalam Proses' ? 'bg-yellow-500 text-white' : 'bg-gray-200 text-gray-700' }}">Dalam Proses</a>
            <a href="{{ route('admin.orders.index', ['status' => 'Dikirim']) }}" class="px-3 py-1 text-sm rounded-full {{ request('status') == 'Dikirim' ? 'bg-green-500 text-white' : 'bg-gray-200 text-gray-700' }}">Dikirim</a>
            <a href="{{ route('admin.orders.index', ['status' => 'Selesai']) }}" class="px-3 py-1 text-sm rounded-full {{ request('status') == 'Selesai' ? 'bg-gray-500 text-white' : 'bg-gray-200 text-gray-700' }}">Selesai</a>
            <a href="{{ route('admin.orders.index', ['status' => 'Dibatalkan']) }}" class="px-3 py-1 text-sm rounded-full {{ request('status') == 'Dibatalkan' ? 'bg-red-500 text-white' : 'bg-gray-200 text-gray-700' }}">Dibatalkan</a>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Order ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Pelanggan</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tanggal</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Total</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                        <th class="relative px-6 py-3"></th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($orders as $order)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#{{ $order->id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $order->user->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $order->order_date->format('d M Y, H:i') }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Rp{{ number_format($order->total_amount, 0, ',', '.') }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                    @if($order->status == 'Baru') bg-blue-100 text-blue-800 @endif
                                    @if($order->status == 'Dalam Proses') bg-yellow-100 text-yellow-800 @endif
                                    @if($order->status == 'Dikirim') bg-green-100 text-green-800 @endif
                                    @if($order->status == 'Selesai') bg-gray-100 text-gray-800 @endif
                                    @if($order->status == 'Dibatalkan') bg-red-100 text-red-800 @endif
                                ">
                                    {{ $order->status }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="{{ route('admin.orders.show', $order) }}" class="text-indigo-600 hover:text-indigo-900">Lihat Detail</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">Belum ada pesanan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            {{ $orders->appends(request()->query())->links() }}
        </div>
    </div>
</x-admin-layout>