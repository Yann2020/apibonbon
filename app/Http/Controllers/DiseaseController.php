<?php

namespace App\Http\Controllers;

use App\Models\Disease;
use Illuminate\Http\Request;

class DiseaseController extends Controller
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
        $disease = Disease::orderByDesc("created_at")->get();
        return response()->json($disease);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Disease::create($request->all()))
            return response()->json(self::SUCCESS);
        return response()->json(self::FAILURE);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Disease  $disease
     * @return \Illuminate\Http\Response
     */
    public function show(Disease $disease)
    {
        return response()->json($disease->with("farmer","healthSchedule")->find($disease));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Disease  $disease
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Disease $disease)
    {
        if($disease->update($request->all()))
            return response()->json(self::SUCCESS);
        return response()->json(self::FAILURE);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Disease  $disease
     * @return \Illuminate\Http\Response
     */
    public function destroy(Disease $disease)
    {
        return ($disease->delete()) ? response()->json(self::SUCCESS) : response()->json(self::FAILURE);
    }
}
