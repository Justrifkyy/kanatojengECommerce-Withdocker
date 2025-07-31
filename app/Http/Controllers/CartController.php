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
            'quantity' => 'required|integer|min:1',
        ]);

        if ($validator->fails()) {
            if ($request->expectsJson()) {
                return response()->json(['success' => false, 'message' => $validator->errors()->first()], 422);
            }
            return back()->withErrors($validator)->withInput();
        }

        $variant = ProductVariant::where('product_id', $request->product_id)
            ->where('size_id', $request->size_id)
            ->first();

        if (!$variant) {
            return response()->json(['success' => false, 'message' => 'Varian produk tidak ditemukan.'], 404);
        }

        // == BARIS YANG HILANG ADA DI SINI ==
        // Cek dulu apakah item sudah ada di keranjang
        $cartItem = CartItem::where('user_id', Auth::id())
            ->where('variant_id', $variant->id)
            ->first();

        if ($cartItem) {
            // Jika sudah ada, tambahkan quantity-nya
            $cartItem->increment('quantity', $request->quantity);
        } else {
            // Jika belum ada, buat item baru
            CartItem::create([
                'user_id' => Auth::id(),
                'variant_id' => $variant->id,
                'quantity' => $request->quantity,
            ]);
        }

        $newCartCount = CartItem::where('user_id', Auth::id())->sum('quantity');

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Produk berhasil ditambahkan!',
                'cartCount' => $newCartCount,
            ]);
        }

        return back()->with('success', 'Produk berhasil ditambahkan ke keranjang!');
    }



    public function update(Request $request, CartItem $cartItem)
    {
        // Pastikan user hanya bisa mengupdate item miliknya sendiri
        if ($cartItem->user_id !== Auth::id()) {
            if ($request->expectsJson()) {
                return response()->json(['success' => false, 'message' => 'Aksi tidak diizinkan.'], 403);
            }
            return back()->with('error', 'Aksi tidak diizinkan.');
        }

        $request->validate(['quantity' => 'required|integer|min:1']);

        // Update quantity di database
        $cartItem->update(['quantity' => $request->quantity]);

        // Hitung ulang data terbaru untuk dikirim kembali sebagai respons
        $user = Auth::user();
        $totalPrice = CartItem::where('user_id', $user->id)
            ->get()
            ->sum(function ($item) {
                // Pastikan relasi ada untuk menghindari error
                if ($item->variant && $item->variant->product) {
                    return $item->quantity * $item->variant->product->price;
                }
                return 0;
            });
        $newCartCount = CartItem::where('user_id', $user->id)->sum('quantity');

        // Jika ini adalah request AJAX, kirim respons JSON
        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Keranjang berhasil diperbarui!',
                'totalPriceFormatted' => 'Rp' . number_format($totalPrice, 0, ',', '.'),
                'cartCount' => $newCartCount,
            ]);
        }

        // Fallback untuk non-AJAX
        return back()->with('success', 'Jumlah produk berhasil diperbarui.');
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
