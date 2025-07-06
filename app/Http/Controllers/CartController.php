<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CartItem;
use App\Models\ProductVariant;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    /**
     * Menampilkan halaman keranjang belanja.
     */
    public function index()
    {
        $user = Auth::user();
        if (!$user) {
            // Jika karena suatu alasan user tidak ditemukan (misal: session berakhir)
            // Redirect ke halaman login untuk mencegah error.
            return redirect()->route('login');
        }

        // Ambil item keranjang milik user, beserta relasi varian, produk, dan ukuran
        $cartItems = CartItem::with(['variant.product', 'variant.size'])
            ->where('user_id', $user->id)
            ->get();

        // **PERBAIKAN UTAMA ADA DI SINI**
        // Hitung total harga dengan lebih aman.
        $totalPrice = $cartItems->sum(function ($item) {
            // Cek apakah relasi variant dan product ada sebelum mengakses price
            if ($item->variant && $item->variant->product) {
                return $item->quantity * $item->variant->product->price;
            }
            // Jika tidak ada, kembalikan 0 agar tidak menyebabkan error
            return 0;
        });

        return view('cart.index', [
            'cartItems' => $cartItems,
            'totalPrice' => $totalPrice
        ]);
    }

    /**
     * Menyimpan item baru ke dalam keranjang.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_id' => 'required|exists:products,id',
            'size_id' => 'required|exists:sizes,id',
        ], [
            'size_id.required' => 'Anda harus memilih ukuran terlebih dahulu.' // Custom error message
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $variant = ProductVariant::where('product_id', $request->product_id)
            ->where('size_id', $request->size_id)
            ->first();

        if (!$variant) {
            return back()->with('error', 'Varian produk tidak ditemukan.');
        }

        $cartItem = CartItem::where('user_id', Auth::id())
            ->where('variant_id', $variant->id)
            ->first();

        if ($cartItem) {
            $cartItem->increment('quantity');
        } else {
            CartItem::create([
                'user_id' => Auth::id(),
                'variant_id' => $variant->id,
                'quantity' => 1,
            ]);
        }

        return back()->with('success', 'Produk berhasil ditambahkan ke keranjang!');
    }

    /**
     * Menghapus item dari keranjang.
     */
    public function destroy(CartItem $cartItem)
    {
        if ($cartItem->user_id !== Auth::id()) {
            return back()->with('error', 'Anda tidak berhak menghapus item ini.');
        }

        $cartItem->delete();

        return back()->with('success', 'Produk berhasil dihapus dari keranjang.');
    }
}
