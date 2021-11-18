<?php

namespace App\Http\Controllers;

use App\Models\AvgAnimalWeight;
use Illuminate\Http\Request;

class AvgAnimalWeightController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $avergeWeight = AvgAnimalWeight::with("batche","farmer")->orderByDesc("created_at")->get();
        return response()->json($avergeWeight);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $overallAverage = ((float)$request->input("max_animal_weight") + (float)$request->input("min_animal_weight")) / 2;

        if(AvgAnimalWeight::create([
            "max_animal_weight" => $request->input("max_animal_weight"),
            "min_animal_weight" => $request->input("min_animal_weight"),
            "species_name" => $request->input("species_name"),
            "overall_average" => $overallAverage,
            "batche_id" => $request->input("batche_id"),
            "farmer_id" => $request->input("farmer_id")
        ]))
        {
            return response()->json(["status"=>"success"],200);
        }
        return response()->json(["status" => "failure"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AvgAnimalWeight  $avgAnimalWeight
     * @return \Illuminate\Http\Response
     */
    public function show(AvgAnimalWeight $avgAnimalWeight)
    {
        return response()->json($avgAnimalWeight->with("batche","farmer")->find($avgAnimalWeight->id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AvgAnimalWeight  $avgAnimalWeight
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AvgAnimalWeight $avgAnimalWeight)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AvgAnimalWeight  $avgAnimalWeight
     * @return \Illuminate\Http\Response
     */
    public function destroy(AvgAnimalWeight $avgAnimalWeight)
    {
        return ($avgAnimalWeight->delete()) ? response()->json(["status"=>"success"]) : response()->json(["status"=>"failure"]);
    }
}
