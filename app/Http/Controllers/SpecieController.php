<?php

namespace App\Http\Controllers;

use App\Models\Specie;
use Illuminate\Http\Request;

class SpecieController extends Controller
{
    const SUCCESS = ["status" => "success"];
    const FAILURE = ["status" => "success"];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Specie::get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Specie::create($request->all()))
            return response()->json(self::SUCCESS);
        return response()->json(self::FAILURE);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Specie  $specie
     * @return \Illuminate\Http\Response
     */
    public function show(Specie $specie)
    {
        $specie = $specie->with("farmer","admin","batches","itemsToSale")->find($specie->id);
        return response()->json($specie);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Specie  $specie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Specie $specie)
    {
        if($specie->update($request->all()))
            return response()->json(self::SUCCESS);
        return response()->json(self::FAILURE);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Specie  $specie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Specie $specie)
    {
        return ($specie->delete()) ? response()->json(self::SUCCESS) : response()->json(self::FAILURE);
    }
}
