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
    public function index()
    {
        $products = Product::with(['category', 'media'])->latest()->paginate(10);
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = ProductCategory::all();
        $sizes = Size::all();
        $colors = Color::all();
        return view('admin.products.create', compact('categories', 'sizes', 'colors'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:product_categories,id',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'is_featured' => 'nullable|boolean',
            'sizes' => 'required|array|min:1',
            'sizes.*' => 'exists:sizes,id',
            'stocks' => 'nullable|array', // Validasi untuk stok
            'stocks.*' => 'nullable|integer|min:0', // Setiap stok harus integer >= 0
            'colors' => 'nullable|array',
            'colors.*' => 'exists:colors,id',
            'media_files' => 'nullable|array',
            'media_files.*' => 'file|mimes:jpg,jpeg,png,webp,mp4,mov,avi|max:20480',
        ]);

        $validated['is_featured'] = $request->has('is_featured');

        DB::transaction(function () use ($validated, $request) {
            $product = Product::create($validated);

            // Siapkan data untuk tabel pivot product_variants
            $variantsData = [];
            foreach ($validated['sizes'] as $sizeId) {
                $variantsData[$sizeId] = ['stock' => $validated['stocks'][$sizeId] ?? 0];
            }
            $product->sizes()->sync($variantsData);

            if (!empty($validated['colors'])) {
                $product->colors()->sync($validated['colors']);
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

    public function edit(Product $product)
    {
        $product->load('media', 'colors', 'variants');
        $categories = ProductCategory::all();
        $sizes = Size::all();
        $colors = Color::all();
        $productSizeIds = $product->sizes->pluck('id')->toArray();
        $productColorIds = $product->colors->pluck('id')->toArray();

        return view('admin.products.edit', compact('product', 'categories', 'sizes', 'colors', 'productSizeIds', 'productColorIds'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:product_categories,id',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'is_featured' => 'nullable|boolean',
            'sizes' => 'required|array|min:1',
            'sizes.*' => 'exists:sizes,id',
            'stocks' => 'nullable|array',
            'stocks.*' => 'nullable|integer|min:0',
            'colors' => 'nullable|array',
            'colors.*' => 'exists:colors,id',
            'media_files' => 'nullable|array',
            'media_files.*' => 'file|mimes:jpg,jpeg,png,webp,mp4,mov,avi|max:20480',
        ]);

        $validated['is_featured'] = $request->has('is_featured');

        DB::transaction(function () use ($product, $validated, $request) {
            $product->update($validated);

            $variantsData = [];
            foreach ($validated['sizes'] as $sizeId) {
                $variantsData[$sizeId] = ['stock' => $validated['stocks'][$sizeId] ?? 0];
            }
            $product->sizes()->sync($variantsData);

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

    public function destroy(Product $product)
    {
        foreach ($product->media as $media) {
            Storage::disk('public')->delete($media->file_path);
        }
        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil dihapus.');
    }

    public function destroyMedia(ProductMedia $media)
    {
        Storage::disk('public')->delete($media->file_path);
        $media->delete();
        return response()->json(['success' => true, 'message' => 'File media berhasil dihapus.']);
    }
}
