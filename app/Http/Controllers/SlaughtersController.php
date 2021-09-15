<?php

namespace App\Http\Controllers;

use App\Models\Slaughters;
use Illuminate\Http\Request;

class SlaughtersController extends Controller
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
        return response()->json(Slaughters::orderByDesc("created_at")->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Slaughters::create($request->all()))
            return response()->json(self::SUCCESS);
        return response()->json(self::FAILURE);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slaughters  $slaughters
     * @return \Illuminate\Http\Response
     */
    public function show(Slaughters $slaughters)
    {
        $slaughters = $slaughters->with("farmer","batche")->firstOrFail();
        return response()->json($slaughters);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slaughters  $slaughters
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slaughters $slaughters)
    {
        if($slaughters->update($request->all()))
            return response()->json(self::SUCCESS);
        return response()->json(self::FAILURE);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slaughters  $slaughters
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slaughters $slaughters)
    {
        return ($slaughters->delete()) ? response()->json(self::SUCCESS) : response()->json(self::FAILURE);
    }
}
