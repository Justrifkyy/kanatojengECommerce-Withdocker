<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductMedia;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        // Menambahkan relasi media untuk mengambil gambar thumbnail
        $products = Product::with(['category', 'media'])->latest()->paginate(10);
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = ProductCategory::all();
        $sizes = Size::all();
        return view('admin.products.create', compact('categories', 'sizes'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:product_categories,id',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'material' => 'nullable|string|max:255',
            'finishing' => 'nullable|string|max:255',
            'sizes' => 'required|array|min:1',
            'sizes.*' => 'exists:sizes,id',
            // Validasi untuk file media (bisa banyak)
            'media_files' => 'nullable|array',
            'media_files.*' => 'file|mimes:jpg,jpeg,png,webp,mp4,mov,avi|max:20480', // Max 20MB per file
        ]);

        DB::transaction(function () use ($validated, $request) {
            // Buat produk terlebih dahulu
            $product = Product::create($validated);

            // Pasang ukuran (create variants)
            $product->sizes()->attach($validated['sizes']);

            // Proses upload file media jika ada
            if ($request->hasFile('media_files')) {
                foreach ($request->file('media_files') as $file) {
                    // Tentukan tipe media berdasarkan MIME type
                    $mediaType = Str::startsWith($file->getMimeType(), 'video') ? 'video' : 'image';

                    // Simpan file ke storage
                    $filePath = $file->store('product-media', 'public');

                    // Buat record di tabel product_media
                    $product->media()->create([
                        'file_path' => $filePath,
                        'media_type' => $mediaType,
                    ]);
                }
            }
        });

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    public function edit(Product $product)
    {
        // Load relasi media untuk ditampilkan di form
        $product->load('media');
        $categories = ProductCategory::all();
        $sizes = Size::all();
        $productSizeIds = $product->sizes->pluck('id')->toArray();

        return view('admin.products.edit', compact('product', 'categories', 'sizes', 'productSizeIds'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:product_categories,id',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'material' => 'nullable|string|max:255',
            'finishing' => 'nullable|string|max:255',
            'sizes' => 'required|array|min:1',
            'sizes.*' => 'exists:sizes,id',
            'media_files' => 'nullable|array',
            'media_files.*' => 'file|mimes:jpg,jpeg,png,webp,mp4,mov,avi|max:20480',
        ]);

        DB::transaction(function () use ($product, $validated, $request) {
            // Update detail produk
            $product->update($validated);

            // Sinkronisasi ukuran
            $product->sizes()->sync($validated['sizes']);

            // Proses upload file media baru jika ada
            if ($request->hasFile('media_files')) {
                foreach ($request->file('media_files') as $file) {
                    $mediaType = Str::startsWith($file->getMimeType(), 'video') ? 'video' : 'image';
                    $filePath = $file->store('product-media', 'public');
                    $product->media()->create([
                        'file_path' => $filePath,
                        'media_type' => $mediaType,
                    ]);
                }
            }
        });

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy(Product $product)
    {
        // Hapus semua file media dari storage sebelum menghapus produk
        foreach ($product->media as $media) {
            Storage::disk('public')->delete($media->file_path);
        }

        // Hapus produk (relasi media dan varian akan terhapus otomatis karena cascade on delete)
        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil dihapus.');
    }

    /**
     * Menghapus satu file media dari produk.
     */
    public function destroyMedia(ProductMedia $media)
    {
        // Hapus file dari storage
        Storage::disk('public')->delete($media->file_path);

        // Hapus record dari database
        $media->delete();

        return back()->with('success', 'File media berhasil dihapus.');
    }
}
