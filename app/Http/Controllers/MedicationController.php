<?php

namespace App\Http\Controllers;

use App\Models\HealthSchedule;
use App\Models\Medication;
use Illuminate\Http\Request;

class MedicationController extends Controller
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
        $medication = HealthSchedule::where("type","medication")->orderByDesc("created_at")->get();
        return response()->json($medication);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return app(HealthScheduleController::class)->store($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Medication  $medication
     * @return \Illuminate\Http\Response
     */
    public function show(Medication $medication)
    {
        $healthSchedule = HealthSchedule::with("farmer","disease","status_schedule","batches")->find($medication->id);
        if(!empty($healthSchedule) && $healthSchedule->type == "medication"):
            $medication = $medication->find($medication->id);
            $medication = array_merge(array($healthSchedule),array($medication));
        else:
            $medication = [];
        endif;
        return response()->json($medication);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Medication  $medication
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Medication $medication)
    {
        return app(HealthScheduleController::class)->update($request, HealthSchedule::class);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Medication  $medication
     * @return \Illuminate\Http\Response
     */
    public function destroy(Medication $medication)
    {
        return ($medication->delete()) ? response()->json(self::SUCCESS) : response()->json(self::FAILURE);
    }
}
