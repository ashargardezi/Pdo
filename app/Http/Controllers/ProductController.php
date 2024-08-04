<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = DB::table('products')
            ->leftJoin('units', 'products.unit_id', '=', 'units.id')
            ->leftJoin('brands', 'products.brand_id', '=', 'brands.id')
            ->leftJoin('categories', 'products.category_id', '=', 'categories.id')
            ->select(
                'products.*',
                'units.name_unit as unit_name',
                'brands.brand_name as brand_name',
                'categories.category_name as category_name',
            )
            ->simplePaginate(10);

        return view('product.index', ['data' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $units = DB::table('units')->select('id', 'name_unit')->get();
        $brands = DB::table('brands')->get();
        $categories = DB::table('categories')->get();

        return view('product.create', [
            'units' => $units,
            'brands' => $brands,
            'categories' => $categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = $request->validate([
            'name' => 'required',
            'Serial_no' => 'nullable',
            'Model_no' => 'nullable',
            'Barcode' => 'required|digits:10',
            'Brand' => 'nullable',
            'category_id' => 'nullable',
            'Product_unit' => 'required',
            'Purchase_price' => 'required',
            'sale_price' => 'required',
            'whole_sale_price' => 'required',
            'alert_quantity' => 'nullable',
            'image' => 'nullable|image',
            'featured' => 'nullable',
        ]);

        $featured = $request->has('featured') ? 1 : 0;

        $imagePath = 'images';
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_' . $image->getClientOriginalName();
            $imagePath = $image->storeAs('images', $filename, 'public');
        }

        DB::table('products')->insert([
            'product_image' => $imagePath,
            'barcode_id' => $product['Barcode'],
            'product_name' => $product['name'],
            'serial_no' => $product['Serial_no'],
            'model_no' => $product['Model_no'] ?? null,
            'brand_id' => $product['Brand'] ?? null,
            'category_id' => $product['category_id'] ?? null,
            'unit_id' => $product['Product_unit'],
            'purchase_price' => $product['Purchase_price'],
            'sale_price' => $product['sale_price'],
            'whole_sale_price' => $product['whole_sale_price'],
            'stock_id' => $product['alert_quantity'] ?? null,
            'featured' => $featured,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        session()->flash('status', 'Product added successfully!');

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Implement as needed
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = DB::table('products')->where('id', $id)->first();
        $units = DB::table('units')->select('id', 'name_unit')->get();
        $barcodes = DB::table('print_barcodes')->get();
        $brands = DB::table('brands')->get();
        $categories = DB::table('categories')->get();

        return view('product.edit', compact('product', 'units', 'barcodes', 'brands', 'categories', 'stocks'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'serial_no' => 'nullable',
            'model_no' => 'nullable',
            'Barcode' => 'required|digits:10', 
            'brand' => 'nullable',
            'category_id' => 'nullable',
            'product_unit' => 'required',
            'purchase_price' => 'required',
            'sale_price' => 'required',
            'whole_sale_price' => 'required',
            'alert_quantity' => 'nullable',
            'image' => 'nullable|image',
            'featured' => 'nullable',
        ]);

        $existingProduct = DB::table('products')->where('id', $id)->first();
        if (!$existingProduct) {
            return redirect()->route('products.index')->with('error', 'Product not found!');
        }

        $imagePath = $existingProduct->product_image;

        if ($request->hasFile('image')) {
            if ($imagePath && Storage::exists($imagePath)) {
                Storage::delete($imagePath);
            }

            $image = $request->file('image');
            $filename = time() . '_' . $image->getClientOriginalName();
            $imagePath = $image->storeAs('images', $filename);
        }

        DB::table('products')->where('id', $id)->update([
            'product_name' => $validated['name'],
            'serial_no' => $validated['serial_no'],
            'model_no' => $validated['model_no'] ?? null,
            'barcode_id' => $validated['Barcode'],
            'brand_id' => $validated['brand'] ?? null,
            'category_id' => $validated['category_id'] ?? null,
            'unit_id' => $validated['product_unit'],
            'purchase_price' => $validated['purchase_price'],
            'sale_price' => $validated['sale_price'],
            'whole_sale_price' => $validated['whole_sale_price'],
            'stock_id' => $validated['alert_quantity'] ?? null,
            'product_image' => $imagePath,
            'updated_at' => now(),
        ]);

        session()->flash('status', 'Product updated successfully!');

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = DB::table('products')->where('id', $id)->first();
        if ($product) {
            if ($product->product_image && Storage::exists($product->product_image)) {
                Storage::delete($product->product_image);
            }

            DB::table('products')->where('id', $id)->delete();
            return redirect()->route('products.index')->with('status', 'Product deleted successfully!');
        } else {
            return redirect()->route('products.index')->with('error', 'Product not found.');
        }
    }
}
