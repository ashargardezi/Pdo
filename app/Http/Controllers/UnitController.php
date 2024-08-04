<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $units = DB::table('units')->simplePaginate(7);
        return view('unit.index', ['data' => $units]);
    }

    /**
     * Show the form for creating a new resource.
     */
    
     public function create(Request $request)
     {
        return view('unit.create');
     }
     
  
     

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        $validated = $request->validate([
            'name_unit' => ['required', 'unique:units', 'max:10','min:2'],
        ]);

       $unit=  DB::table('units')->insert([
            'name_unit' => $request->name_unit,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return redirect()->route('units.index');
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

        
        $unit = DB::table('units')->where('id', $id)->first();

       

        return view('unit.edit', compact('unit'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{


    $validated = $request->validate([
        'name_unit' => ['required', 'unique:units,name_unit,' . $id, 'max:10', 'min:2'],
    ]);

    DB::table('units')
        ->where('id', $id)
        ->update([
            'name_unit' => $validated['name_unit'],
            'updated_at' => now(),
        ]);

    return redirect()->route('units.index')->with('success', 'Unit updated successfully!');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $unit = DB::table('units')->where('id', $id)->first();
        if ($unit) {
            // Delete the unit
            DB::table('units')->where('id', $id)->delete();
            
            // Redirect to the units index with a success message
            return redirect()->route('units.index')->with('success', 'Unit deleted successfully!');
        } else {
            // Redirect to the units index with an error message if the unit is not found
            return redirect()->route('units.index')->with('error', 'Unit not found!');
        }
    }
}
