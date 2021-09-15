<?php

namespace App\Http\Controllers;

use App\Models\Batche;
use Illuminate\Http\Request;

class BatcheController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $batches = Batche::with("specie","breed","mortalities","healtSchedule")->orderByDesc("created_at")->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Batche::create($request->all()))
            return response()->json(["status"=>"success"]);
        return response()->json(["status"=>"failure"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Batche  $batche
     * @return \Illuminate\Http\Response
     */
    public function show(Batche $batche)
    {
        $batche = $batche->with("admin","specie","breed","itemsToTake","mortalities","avgAnimalWeight","healtSchedule","stockItemsToSale","slaughter")->firstOrFail();
        return response()->json($batche);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Batche  $batche
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Batche $batche)
    {
        if($batche->update($request->all()))
            return response()->json(["status" => "success"]);
        return response()->json(["status" => "failure"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Batche  $batche
     * @return \Illuminate\Http\Response
     */
    public function destroy(Batche $batche)
    {
        return ($batche->delete) ? response()->json(["status"=>"success"]) : response()->json(["status" => "failure"]);
    }
}
