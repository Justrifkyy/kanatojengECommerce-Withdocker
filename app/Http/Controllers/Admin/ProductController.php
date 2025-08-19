<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductMedia;
use App\Models\Size;
use App\Models\Color;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Menampilkan daftar semua produk.
     */
    public function index()
    {
        $products = Product::with(['category', 'media'])->latest()->paginate(10);
        return view('admin.products.index', compact('products'));
    }

    /**
     * Menampilkan form untuk membuat produk baru.
     */
    public function create()
    {
        $categories = ProductCategory::orderBy('name')->get();
        $sizes = Size::all();
        $colors = Color::orderBy('name')->get();
        return view('admin.products.create', compact('categories', 'sizes', 'colors'));
    }

    /**
     * Menyimpan produk baru ke database.
     */
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
            'colors' => 'nullable|array',
            'colors.*' => 'exists:colors,id',
            'media_files' => 'nullable|array',
            'media_files.*' => 'file|mimes:jpg,jpeg,png,webp,mp4,mov,avi|max:20480',
            'is_featured' => 'nullable', // Hapus aturan 'boolean' untuk sementara
        ]);

        // FIX: Menangani nilai boolean dari checkbox secara manual
        $validated['is_featured'] = $request->has('is_featured');

        DB::transaction(function () use ($validated, $request) {
            $product = Product::create($validated);
            $product->sizes()->attach($validated['sizes']);

            if (!empty($validated['colors'])) {
                $product->colors()->attach($validated['colors']);
            }

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

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    /**
     * Menampilkan form untuk mengedit produk yang sudah ada.
     */
    public function edit(Product $product)
    {
        $product->load('media', 'colors', 'sizes');
        $categories = ProductCategory::orderBy('name')->get();
        $sizes = Size::all();
        $colors = Color::orderBy('name')->get();
        $productSizeIds = $product->sizes->pluck('id')->toArray();
        $productColorIds = $product->colors->pluck('id')->toArray();

        return view('admin.products.edit', compact('product', 'categories', 'sizes', 'colors', 'productSizeIds', 'productColorIds'));
    }

    /**
     * Memperbarui produk yang sudah ada di database.
     */
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
            'colors' => 'nullable|array',
            'colors.*' => 'exists:colors,id',
            'media_files' => 'nullable|array',
            'media_files.*' => 'file|mimes:jpg,jpeg,png,webp,mp4,mov,avi|max:20480',
            'is_featured' => 'nullable', // Hapus aturan 'boolean' untuk sementara
        ]);

        // FIX: Menangani nilai boolean dari checkbox secara manual
        $validated['is_featured'] = $request->has('is_featured');

        DB::transaction(function () use ($product, $validated, $request) {
            $product->update($validated);
            $product->sizes()->sync($validated['sizes'] ?? []);
            $product->colors()->sync($validated['colors'] ?? []);

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

    /**
     * Menghapus produk dari database.
     */
    public function destroy(Product $product)
    {
        foreach ($product->media as $media) {
            Storage::disk('public')->delete($media->file_path);
        }

        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil dihapus.');
    }

    /**
     * Menghapus satu file media dari produk.
     */
    public function destroyMedia(Request $request, ProductMedia $media)
    {
        // Hapus file dari storage
        Storage::disk('public')->delete($media->file_path);

        // Hapus record dari database
        $media->delete();

        // Jika ini adalah request AJAX, kirim respons JSON
        if ($request->expectsJson()) {
            return response()->json(['success' => true, 'message' => 'File media berhasil dihapus.']);
        }

        // Fallback untuk non-AJAX
        return back()->with('success', 'File media berhasil dihapus.');
    }
}
