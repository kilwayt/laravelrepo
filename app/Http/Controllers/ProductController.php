<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductInfo;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'stock_count' => 'required|integer|min:0',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('product_images', 'public');
        }

        Product::create([
            'name' => $request->name,
            'image_url' => $imagePath,
            'stock_count' => $request->stock_count,
        ]);

        return redirect()->back()->with('success', 'Product added successfully!');
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        $productInfos = ProductInfo::where('product_id', $id)->get();

        return view('products.show', compact('product', 'productInfos'));
    }

    public function createProductInfo($productId)
    {
        $product = Product::findOrFail($productId);
        return view('products.create_product_info', compact('product'));
    }

    public function storeProductInfo(Request $request, $productId)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'password' => 'required|string|max:255',
            'status' => 'required|string|in:active,not_active',
        ]);

        ProductInfo::create([
            'product_id' => $productId,
            'username' => $request->username,
            'password' => $request->password,
            'status' => $request->status,
        ]);

        return redirect()->route('products.show', $productId)->with('success', 'Product info added successfully!');
    }

    public function destroyProductInfo(Product $product, ProductInfo $info)
    {
        // Delete product information
        $info->delete();

        return back()->with('success', 'Product information deleted successfully.');
    }
    public function destroy($id)
    {
        // Find the product by its ID
        $product = Product::findOrFail($id);
    
        // Check if there are related product info records
        $relatedProductInfos = ProductInfo::where('product_id', $id)->exists();
    
        // If there are related product info records, redirect with an error message
        if ($relatedProductInfos) {
            return redirect()->route('products.index')->with('error', 'You cant delete This Product.');
        }
    
        // If no related records, proceed with deletion
        $product->delete();
    
        // Redirect with a success message
        return redirect()->route('products.index')->with('success', 'Product deleted successfully');
    }
    


    
    

    public function editProductInfo(Product $product, ProductInfo $info)
    {
        return view('products.edit_product_info', compact('product', 'info'));
    }

    public function updateProductInfo(Request $request, Product $product, ProductInfo $info)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'password' => 'required|string|max:255',
            'status' => 'required|string|in:active,not_active',
        ]);

        $info->update([
            'username' => $request->username,
            'password' => $request->password,
            'status' => $request->status,
        ]);

        return redirect()->route('products.show', $product->id)->with('success', 'Product information updated successfully.');
    }
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
            'stock_count' => 'required|integer|min:0',
        ]);

        // Handle the image upload if present
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('product_images', 'public');
            $validatedData['image_url'] = $imagePath;
        }

        // Update the product with validated data
        $product->update($validatedData);

        return redirect()->route('products.index')->with('success', 'Product updated successfully');
    }
}
