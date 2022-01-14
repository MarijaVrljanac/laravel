<?php

namespace App\Http\Controllers;

use App\Http\Resources\BeautyResource;
use App\Models\Beauty;
use Illuminate\Http\Request;

class BeautyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $beauty = Beauty::all();
        return BeautyResource::collection($beauty);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Beauty  $beauty
     * @return \Illuminate\Http\Response
     */
    public function show(Beauty $beauty)
    {
        return new BeautyResource(Beauty::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Beauty  $beauty
     * @return \Illuminate\Http\Response
     */
    public function edit(Beauty $beauty)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Beauty  $beauty
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Beauty $beauty)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Beauty  $beauty
     * @return \Illuminate\Http\Response
     */
    public function destroy(Beauty $beauty)
    {
        //
    }
}
