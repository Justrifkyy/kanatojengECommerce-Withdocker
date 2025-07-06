<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->latest()->paginate(10);
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'sizes' => 'required|array|min:1',
            'sizes.*' => 'exists:sizes,id',
        ]);

        // Handle file upload
        if ($request->hasFile('image')) {
            $validated['image_path'] = $request->file('image')->store('product-images', 'public');
        }

        DB::transaction(function () use ($validated) {
            // Create product
            $product = Product::create([
                'name' => $validated['name'],
                'category_id' => $validated['category_id'],
                'price' => $validated['price'],
                'description' => $validated['description'],
                'material' => $validated['material'],
                'finishing' => $validated['finishing'],
                'image_path' => $validated['image_path'] ?? null,
            ]);

            // Attach sizes (create variants)
            $product->sizes()->attach($validated['sizes']);
        });

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    public function edit(Product $product)
    {
        $categories = ProductCategory::all();
        $sizes = Size::all();
        // Get IDs of sizes currently attached to the product
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'sizes' => 'required|array|min:1',
            'sizes.*' => 'exists:sizes,id',
        ]);

        // Handle file upload
        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if ($product->image_path) {
                Storage::disk('public')->delete($product->image_path);
            }
            $validated['image_path'] = $request->file('image')->store('product-images', 'public');
        }

        DB::transaction(function () use ($product, $validated) {
            // Update product details
            $product->update([
                'name' => $validated['name'],
                'category_id' => $validated['category_id'],
                'price' => $validated['price'],
                'description' => $validated['description'],
                'material' => $validated['material'],
                'finishing' => $validated['finishing'],
                'image_path' => $validated['image_path'] ?? $product->image_path, // Keep old image if no new one
            ]);

            // Sync sizes (add/remove variants as needed)
            $product->sizes()->sync($validated['sizes']);
        });

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy(Product $product)
    {
        // Delete image from storage
        if ($product->image_path) {
            Storage::disk('public')->delete($product->image_path);
        }

        // The database cascade on delete will handle deleting related variants
        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil dihapus.');
    }
}
