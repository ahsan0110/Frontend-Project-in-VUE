<?php

namespace App\Http\Controllers;

use App\Models\MetaTest;
use Illuminate\Http\Request;

class MetaTestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(MetaTest::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request){
        $data = $request->validate([
            'name'=>'required',
            'description'=>'required',
        ]);
        $newProduct = MetaTest::create($data);
        
        return redirect(route('product.index'));
    }
    

    /**
     * Display the specified resource.
     */
    public function show(MetaTest $metaTest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MetaTest $metaTest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MetaTest $metaTest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MetaTest $metaTest)
    {
        //
    }
}
