<?php

namespace App\Http\Controllers;

use App\Models\HealthSchedule;
use App\Models\Medication;
use App\Models\Vaccination;
use Illuminate\Http\Request;

class HealthScheduleController extends Controller
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
        $healthSchedule = HealthSchedule::with("farmer","disease","status_schedule")->get();
        return response()->json($healthSchedule);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /**
         * il faudra créer une boucle d'exécution pour la table pivot 
         */
        if(HealthSchedule::create($request->all()))
            $healthSchedule = HealthSchedule::latest()->firstOrfail();
            if($request->input("type") == "vaccination"):
                Vaccination::create([
                    "id" => $healthSchedule->id,
                    "name" => $request->input("name"),
                    "animal_numbers" => $request->input("animal_numbers"),
                    "vaccinated_by" => $request->input("nurse")
                ]);
            elseif($request->input("type") == "medication"):
                Medication::create([
                    "id" => $healthSchedule->id,
                    "name" => $request->input("name"),
                    "animal_numbers" => $request->input("animal_numbers"),
                    "medicated_by" => $request->input("nurse") 
                ]);
            endif;
            $healthSchedule->batches()->attach((int)$request->input('batche_id'));

            return response()->json(self::SUCCESS);
        return response()->jsonp(self::FAILURE);

        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HealthSchedule  $healthSchedule
     * @return \Illuminate\Http\Response
     */
    public function show(HealthSchedule $healthSchedule)
    {
        $healthSchedule = $healthSchedule->with("farmer","disease","status_schedule","batches")->find($healthSchedule->id);

        if($healthSchedule->type == "vaccination"){
            $vaccination = Vaccination::find($healthSchedule->id);
            $healthSchedule = array($healthSchedule,$vaccination);
        }
        else{
            $medication = Medication::find($healthSchedule->id);
            $healthSchedule = array($healthSchedule,$medication);
        }
        return response()->json($healthSchedule);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HealthSchedule  $healthSchedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HealthSchedule $healthSchedule)
    {
        if($healthSchedule->update($request->all()))
            return response()->json(self::SUCCESS);
        return response()->json(self::FAILURE);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HealthSchedule  $healthSchedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(HealthSchedule $healthSchedule)
    {
        return ($healthSchedule->delete()) ? response()->json(self::SUCCESS) : response()->json(self::FAILURE);
    }
}
