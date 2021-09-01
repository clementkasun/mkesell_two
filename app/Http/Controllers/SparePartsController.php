<?php

namespace App\Http\Controllers;

use App\Models\SparePart;
use Illuminate\Http\Request;

class SparePartsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('registration.spare_parts');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $SpareParts = SparePart::create(['']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SpareParts  $spareParts
     * @return \Illuminate\Http\Response
     */
    public function show(SpareParts $spareParts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SpareParts  $spareParts
     * @return \Illuminate\Http\Response
     */
    public function edit(SpareParts $spareParts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SpareParts  $spareParts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SpareParts $spareParts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SpareParts  $spareParts
     * @return \Illuminate\Http\Response
     */
    public function destroy(SpareParts $spareParts)
    {
        //
    }
}
