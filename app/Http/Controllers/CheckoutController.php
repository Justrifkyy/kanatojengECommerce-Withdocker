<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Setting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function processToWhatsApp()
    {
        $user = Auth::user();
        $cartItems = CartItem::with(['variant.product', 'variant.size'])
            ->where('user_id', $user->id)
            ->get();

        // 1. Pastikan keranjang tidak kosong
        if ($cartItems->isEmpty()) {
            return back()->with('error', 'Keranjang Anda kosong. Tidak ada yang bisa di-checkout.');
        }

        // 2. Hitung total harga
        $totalPrice = $cartItems->sum(function ($item) {
            if ($item->variant && $item->variant->product) {
                return $item->quantity * $item->variant->product->price;
            }
            return 0;
        });

        // 3. Simpan pesanan ke database (ini penting untuk riwayat)
        // Gunakan DB Transaction untuk memastikan semua proses berhasil atau tidak sama sekali
        DB::transaction(function () use ($cartItems, $user, $totalPrice) {
            // Buat record di tabel 'orders'
            $order = Order::create([
                'user_id' => $user->id,
                'total_amount' => $totalPrice,
                'status' => 'Baru', // Status awal pesanan
                'order_date' => now(),
            ]);

            // Pindahkan setiap item dari keranjang ke 'order_items'
            foreach ($cartItems as $item) {
                if ($item->variant && $item->variant->product) {
                    OrderItem::create([
                        'order_id' => $order->id,
                        'product_name' => $item->variant->product->name,
                        'size_info' => $item->variant->size->size_number,
                        'quantity' => $item->quantity,
                        'price' => $item->variant->product->price,
                    ]);
                }
            }

            // 4. Kosongkan keranjang belanja pengguna
            CartItem::where('user_id', $user->id)->delete();
        });

        // 5. Format pesan untuk WhatsApp
        $message = "Halo Kana Tojeng, saya ingin memesan:\n\n";
        $message .= "*Nama Pemesan:* " . $user->name . "\n";
        $message .= "*Email:* " . $user->email . "\n\n";
        $message .= "*Detail Pesanan:*\n";

        foreach ($cartItems as $item) {
            if ($item->variant && $item->variant->product) {
                $subtotal = $item->quantity * $item->variant->product->price;
                $message .= "- " . $item->quantity . "x " . $item->variant->product->name .
                    " (Ukuran: " . $item->variant->size->size_number . ")" .
                    " - Rp" . number_format($subtotal, 0, ',', '.') . "\n";
            }
        }

        $message .= "\n*Total Harga: Rp" . number_format($totalPrice, 0, ',', '.') . "*\n\n";
        $message .= "Mohon konfirmasi untuk proses pembayaran selanjutnya. Terima kasih.";

        // 6. Buat URL WhatsApp dan arahkan pengguna
        $adminPhoneNumber = config('app.admin_whatsapp_number', env('ADMIN_WHATSAPP_NUMBER'));
        $encodedMessage = rawurlencode($message);
        $whatsappUrl = "https://wa.me/{$adminPhoneNumber}?text={$encodedMessage}";

        return redirect()->away($whatsappUrl);
    }
}
