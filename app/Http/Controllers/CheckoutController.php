<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Setting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log; // Import Log facade

class CheckoutController extends Controller
{
    public function processToWhatsApp()
    {
        $user = Auth::user();
        $cartItems = CartItem::with(['variant.product', 'variant.size'])
            ->where('user_id', $user->id)
            ->get();

        if ($cartItems->isEmpty()) {
            return back()->with('error', 'Keranjang Anda kosong. Tidak ada yang bisa di-checkout.');
        }

        try {
            // Kita bungkus semua logika di dalam try-catch untuk menangani error tak terduga
            $totalPrice = 0;
            $message = "Halo Kana Tojeng, saya ingin memesan:\n\n";
            $message .= "*Nama Pemesan:* " . $user->name . "\n";
            $message .= "*Email:* " . $user->email . "\n\n";
            $message .= "*Detail Pesanan:*\n";

            DB::transaction(function () use ($cartItems, $user, &$totalPrice, &$message) {
                // Buat record order terlebih dahulu
                $order = new Order([
                    'user_id' => $user->id,
                    'total_amount' => 0, // Akan di-update nanti
                    'status' => 'Baru',
                    'order_date' => now(),
                ]);
                $order->save();

                foreach ($cartItems as $item) {
                    // --- PERBAIKAN UTAMA ADA DI SINI ---
                    // Pastikan variant dan product ada sebelum diproses
                    if (!$item->variant || !$item->variant->product) {
                        // Jika ada data aneh, lewati item ini dan lanjutkan
                        Log::warning('Skipping invalid cart item during checkout.', ['cart_item_id' => $item->id]);
                        continue;
                    }

                    $product = $item->variant->product;
                    $variant = $item->variant;
                    $subtotal = $item->quantity * $product->price;
                    $totalPrice += $subtotal;

                    // Buat pesan WhatsApp
                    $isPreOrder = $variant->stock <= 0;
                    $message .= "- " . $item->quantity . "x " . $product->name .
                        " (Ukuran: " . $item->variant->size->size_number . ")" .
                        " - Rp" . number_format($subtotal, 0, ',', '.') .
                        ($isPreOrder ? " *(PRE-ORDER)*" : "") . "\n";

                    // Buat OrderItem
                    OrderItem::create([
                        'order_id' => $order->id,
                        'product_name' => $product->name,
                        'size_info' => $item->variant->size->size_number,
                        'quantity' => $item->quantity,
                        'price' => $product->price,
                    ]);

                    // Kurangi stok HANYA jika bukan pre-order
                    if (!$isPreOrder) {
                        $variant->decrement('stock', $item->quantity);
                    }
                }

                // Update total harga di order utama
                $order->total_amount = $totalPrice;
                $order->save();

                // Kosongkan keranjang
                CartItem::where('user_id', $user->id)->delete();
            });

            // Selesaikan pesan WhatsApp
            $message .= "\n*Total Harga: Rp" . number_format($totalPrice, 0, ',', '.') . "*\n\n";
            $message .= "Mohon konfirmasi untuk proses pembayaran selanjutnya. Terima kasih.";

            // Buat URL WhatsApp
            $adminPhoneNumber = Setting::where('key', 'whatsapp_number')->first()->value ?? env('ADMIN_WHATSAPP_NUMBER');
            $encodedMessage = rawurlencode($message);
            $whatsappUrl = "https://wa.me/{$adminPhoneNumber}?text={$encodedMessage}";

            return redirect()->away($whatsappUrl);
        } catch (\Exception $e) {
            // Jika terjadi error apa pun selama proses, catat di log dan beri tahu pengguna
            Log::error('Checkout process failed: ' . $e->getMessage());
            return back()->with('error', 'Terjadi kesalahan saat memproses checkout. Silakan coba lagi.');
        }
    }
}
