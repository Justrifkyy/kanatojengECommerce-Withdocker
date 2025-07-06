<x-admin-layout>
    <x-slot name="header">
        Detail Pesanan #{{ $order->id }}
    </x-slot>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        {{-- Kolom Kiri: Detail Pesanan & Item --}}
        <div class="md:col-span-2 space-y-6">
            <div class="bg-white p-6 rounded-lg shadow">
                <h3 class="text-lg font-semibold border-b pb-2 mb-4">Item Pesanan</h3>
                <table class="min-w-full">
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($order->items as $item)
                            <tr>
                                <td class="py-2">{{ $item->quantity }}x</td>
                                <td class="py-2 font-medium">{{ $item->product_name }} ({{ $item->size_info }})</td>
                                <td class="py-2 text-right">Rp{{ number_format($item->price * $item->quantity, 0, ',', '.') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot class="border-t-2 border-gray-300">
                        <tr>
                            <td colspan="2" class="pt-2 font-bold text-right">Total</td>
                            <td class="pt-2 font-bold text-right">Rp{{ number_format($order->total_amount, 0, ',', '.') }}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <div class="bg-white p-6 rounded-lg shadow">
                <h3 class="text-lg font-semibold border-b pb-2 mb-4">Detail Pelanggan</h3>
                <dl class="space-y-2">
                    <div class="grid grid-cols-3 gap-4">
                        <dt class="font-medium text-gray-500">Nama</dt>
                        <dd class="col-span-2">{{ $order->user->name }}</dd>
                    </div>
                    <div class="grid grid-cols-3 gap-4">
                        <dt class="font-medium text-gray-500">Email</dt>
                        <dd class="col-span-2">{{ $order->user->email }}</dd>
                    </div>
                     <div class="grid grid-cols-3 gap-4">
                        <dt class="font-medium text-gray-500">No. Telepon</dt>
                        <dd class="col-span-2">{{ $order->user->phone_number ?? '-' }}</dd>
                    </div>
                </dl>
            </div>
        </div>

        {{-- Kolom Kanan: Info & Aksi --}}
        <div class="md:col-span-1 space-y-6">
            <div class="bg-white p-6 rounded-lg shadow">
                <h3 class="text-lg font-semibold border-b pb-2 mb-4">Info Pesanan</h3>
                <dl class="space-y-2">
                    <div class="flex justify-between">
                        <dt class="font-medium text-gray-500">Tanggal Pesan</dt>
                        <dd>{{ $order->order_date->format('d M Y, H:i') }}</dd>
                    </div>
                    <div class="flex justify-between">
                        <dt class="font-medium text-gray-500">Status</dt>
                        <dd class="font-semibold">{{ $order->status }}</dd>
                    </div>
                </dl>
            </div>

            <div class="bg-white p-6 rounded-lg shadow">
                <h3 class="text-lg font-semibold mb-4">Update Status</h3>
                <form action="{{ route('admin.orders.updateStatus', $order) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div>
                        <label for="status" class="sr-only">Status</label>
                        <select id="status" name="status" class="block w-full rounded-md border-gray-300 shadow-sm">
                            <option value="Baru" @selected($order->status == 'Baru')>Baru</option>
                            <option value="Dalam Proses" @selected($order->status == 'Dalam Proses')>Dalam Proses</option>
                            <option value="Dikirim" @selected($order->status == 'Dikirim')>Dikirim</option>
                            <option value="Selesai" @selected($order->status == 'Selesai')>Selesai</option>
                            <option value="Dibatalkan" @selected($order->status == 'Dibatalkan')>Dibatalkan</option>
                        </select>
                    </div>
                    <button type="submit" class="mt-4 w-full bg-indigo-600 text-white py-2 rounded-md hover:bg-indigo-700">Update Status</button>
                </form>
            </div>
        </div>
    </div>
</x-admin-layout>