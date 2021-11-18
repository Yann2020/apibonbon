<?php

namespace App\Http\Controllers;

use App\Models\Batche;
use App\Models\Mortality;
use Illuminate\Http\Request;

class MortalityController extends Controller
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
        $mortality = Mortality::with("farmer","batche")->orderByDesc("created_at")->get();
        return response()->json($mortality);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $batche = Batche::find($request->input('batche_id'));
        $totalReduction = (int)$request->input('number');
        $totalReduction = (int)$batche->total < $totalReduction ? (int)$batche->totala - $totalReduction : 0;

        if(!empty($totalReduction))
            if(Mortality::create($request->all())) 
                $batche->update(['total'=>$totalReduction]);
                return response()->json(self::SUCCESS);
            return response()->json(self::FAILURE);
        return response()->json(['status'=>'the total available animal is less than reduction']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mortality  $mortality
     * @return \Illuminate\Http\Response
     */
    public function show(Mortality $mortality)
    {
        return response()->json($mortality->with("farmer","batche")->find($mortality->id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mortality  $mortality
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mortality $mortality)
    {
        if($mortality->update($request->all()))
            return response()->json(self::SUCCESS);
        return response()->json(self::FAILURE);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mortality  $mortality
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mortality $mortality)
    {
        return ($mortality->delete()) ? response()->json(self::SUCCESS) : response()->json(self::FAILURE);
    }
}
