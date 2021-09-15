<?php

namespace App\Http\Controllers;

use App\Models\HealthSchedule;
use App\Models\Vaccination;
use Illuminate\Http\Request;

class VaccinationController extends Controller
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
        $vaccination = HealthSchedule::where("type","vaccination")->orderByDesc("created_at")->get();
        return response()->json($vaccination);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return app(HealthSchedule::class)->store($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vaccination  $vaccination
     * @return \Illuminate\Http\Response
     */
    public function show(Vaccination $vaccination)
    {
        $healthSchedule = HealthSchedule::find($vaccination->id)->with("farmer","disease","status_schedule","batches")->first();
        $vaccination = $vaccination->first();
        $vaccination = array_merge($healthSchedule,$vaccination);
        return response()->json($vaccination);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vaccination  $vaccination
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vaccination $vaccination)
    {
        return app(HealthSchedule::class)->update($request,HealthSchedule::class);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vaccination  $vaccination
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vaccination $vaccination)
    {
        return ($vaccination->delete()) ? response()->json(self::SUCCESS) : response()->json(self::FAILURE);
    }
}
