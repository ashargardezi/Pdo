<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $categories = DB::table('categories')->paginate(5);
        return view('category.index', ['data' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_name' => 'required',
            'image' => 'nullable|image',
            'parent_cat' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_' . $image->getClientOriginalName();
            $path = $image->storeAs('', $filename);

            $validated['image'] = $path;
        }
        

        DB::table('categories')->insert([
            'category_name' => $validated['category_name'],
            'parent_category' => $validated['parent_cat'],
            'image' => $validated['image'] ?? 'images/no-image.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Session::flash('success', 'Category created successfully!');

        return redirect()->route('category.index');
    }
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // $category = DB::table('categories')->where('id', $id)->first();
        // return view('category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = DB::table('categories')->where('id', $id)->first();
        return view('category.edit', compact('category'));
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'category_name' => 'required',
            'image' => 'nullable|image',
            'parent_cat' => 'required',
        ]);

        $existingCategory = DB::table('categories')->where('id', $id)->first();

        $imagePath = $existingCategory->image;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_' . $image->getClientOriginalName();
            $imagePath = $image->storeAs('images', $filename);
        }

        DB::table('categories')->where('id', $id)->update([
            'category_name' => $validated['category_name'],
            'parent_category' => $validated['parent_cat'],
            'image' => $imagePath,
            'updated_at' => now(),
        ]);

        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category = DB::table('categories')->where('id', $id)->first();
        if ($category) {
            DB::table('categories')->where('id', $id)->delete();
            return redirect()->route('category.index')->with('success', 'Category deleted successfully!');
        } else {
            return redirect()->route('category.index')->with('error', 'Category not found!');
        }
    }
}
