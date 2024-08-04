<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Psy\Command\WhereamiCommand;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands =  DB::table('brands')->simplePaginate(7);
        return view('brands.index', ['data' => $brands]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('brands.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'brand_name' => 'required',
            'image' => 'nullable|image',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_' . $image->getClientOriginalName();
            $path = $image->storeAs('public/images', $filename);

            // Store the relative path for database storage
            $validated['image'] = $path;
        }

        DB::table('brands')->insert([
            'brand_name' => $validated['brand_name'],
            'image' => $validated['image'] ?? null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        return redirect()->route('brand.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $brand = DB::table('brands')->where('id', $id)->first();

        return view('brands.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'brand_name' => 'required',
            'image' => 'nullable|image',
        ]);

        $brand = DB::table('brands')->where('id', $id)->first();
       

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_' . $image->getClientOriginalName();
            $path = $image->storeAs('public/images', $filename);

            $validated['image'] = $path;
        } else {
            $validated['image'] = $brand->image;
        }

        // Update 
        DB::table('brands')
            ->where('id', $id)
            ->update([
                'brand_name' => $validated['brand_name'],
                'image' => $validated['image'],
                'updated_at' => now(),
            ]);

        // Redirect with success message
        return redirect()->route('brand.index')->with('success', 'Brand updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $brand = DB::table('brands')->where('id', $id)->first();
        if ($brand) {
            DB::table('brands')->where('id', $id)->delete();
            return redirect()->route('brand.index')->with('success', 'Brand deleted successfully!');
        } else {

            redirect()->route('brand.index')->with('error', 'Brand not found.');
        }
    }
}
