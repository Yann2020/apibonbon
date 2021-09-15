<?php

namespace App\Http\Controllers;

use App\Models\StatusSchedule;
use Illuminate\Http\Request;

use function PHPUnit\Framework\returnSelf;

class StatusScheduleController extends Controller
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
        return response()->json(StatusSchedule::get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(StatusSchedule::create($request->all()))
            return response()->json(self::SUCCESS);
        return response()->json(self::FAILURE);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StatusSchedule  $statusSchedule
     * @return \Illuminate\Http\Response
     */
    public function show(StatusSchedule $statusSchedule)
    {
        return response()->json($statusSchedule->with("admin","healthSchedule")->first());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StatusSchedule  $statusSchedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StatusSchedule $statusSchedule)
    {
        if($statusSchedule->update($request->all()))
            return response()->json(self::SUCCESS);
        return response()->json(self::FAILURE);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StatusSchedule  $statusSchedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(StatusSchedule $statusSchedule)
    {
        return ($statusSchedule->delete()) ? response()->json(self::SUCCESS) : response()->json(self::FAILURE);
    }
}
