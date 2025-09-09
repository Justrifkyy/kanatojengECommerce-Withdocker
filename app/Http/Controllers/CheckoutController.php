<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Setting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CheckoutController extends Controller
{
    public function processToWhatsApp()
    {
        $user = Auth::user();
        // Muat relasi yang lebih dalam untuk mendapatkan akses ke stok
        $cartItems = CartItem::with(['variant.product', 'variant.size'])
            ->where('user_id', $user->id)
            ->get();

        if ($cartItems->isEmpty()) {
            return back()->with('error', 'Keranjang Anda kosong. Tidak ada yang bisa di-checkout.');
        }

        $totalPrice = $cartItems->sum(function ($item) {
            if ($item->variant && $item->variant->product) {
                return $item->quantity * $item->variant->product->price;
            }
            return 0;
        });

        // Variabel untuk menyimpan pesan WhatsApp
        $message = "Halo Kana Tojeng, saya ingin memesan:\n\n";
        $message .= "*Nama Pemesan:* " . $user->name . "\n";
        $message .= "*Email:* " . $user->email . "\n\n";
        $message .= "*Detail Pesanan:*\n";

        DB::transaction(function () use ($cartItems, $user, $totalPrice, &$message) {
            $order = Order::create([
                'user_id' => $user->id,
                'total_amount' => $totalPrice,
                'status' => 'Baru',
                'order_date' => now(),
            ]);

            foreach ($cartItems as $item) {
                if ($item->variant && $item->variant->product) {
                    $variant = $item->variant; // Ambil varian produk
                    $product = $variant->product;
                    $size = $variant->size;

                    // Cek stok saat ini
                    $isPreOrder = ($variant->pivot->stock <= 0);

                    // Bangun nama item untuk pesan WhatsApp
                    $itemNameForMessage = "- " . $item->quantity . "x " . $product->name . " (Ukuran: " . $size->size_number . ")";

                    // Tambahkan label (PRE-ORDER) jika stok habis
                    if ($isPreOrder) {
                        $itemNameForMessage .= " *(PRE-ORDER)*";
                    }

                    $subtotal = $item->quantity * $product->price;
                    $itemNameForMessage .= " - Rp" . number_format($subtotal, 0, ',', '.');

                    // Tambahkan baris item ke pesan utama
                    $message .= $itemNameForMessage . "\n";

                    // Buat OrderItem di database
                    OrderItem::create([
                        'order_id' => $order->id,
                        'product_name' => $product->name . ($isPreOrder ? " (PRE-ORDER)" : ""),
                        'size_info' => $size->size_number,
                        'quantity' => $item->quantity,
                        'price' => $product->price,
                    ]);

                    // Kurangi stok HANYA jika bukan pre-order
                    if (!$isPreOrder) {
                        $variant->pivot->decrement('stock', $item->quantity);
                    }
                }
            }

            CartItem::where('user_id', $user->id)->delete();
        });

        $message .= "\n*Total Harga: Rp" . number_format($totalPrice, 0, ',', '.') . "*\n\n";
        $message .= "Mohon konfirmasi untuk proses pembayaran selanjutnya. Terima kasih.";

        $adminPhoneNumber = Setting::where('key', 'whatsapp_number')->first()->value ?? env('ADMIN_WHATSAPP_NUMBER');
        $encodedMessage = rawurlencode($message);
        $whatsappUrl = "https://wa.me/{$adminPhoneNumber}?text={$encodedMessage}";

        return redirect()->away($whatsappUrl);
    }
}
