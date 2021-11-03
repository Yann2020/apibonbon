<?php

namespace App\Http\Controllers;

use App\Models\FoodsType;
use Illuminate\Http\Request;

class FoodsTypeController extends Controller
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
        $foodsType = FoodsType::get();
        return response()->json($foodsType);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(FoodsType::create($request->all()))
            return response()->json(self::SUCCESS);
        return response()->json(self::FAILURE);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FoodsType  $foodsType
     * @return \Illuminate\Http\Response
     */
    public function show(FoodsType $foodsType)
    {
        return response()->json($foodsType->findOrFail($foodsType->id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FoodsType  $foodsType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FoodsType $foodsType)
    {
        if($foodsType->update($request->all()))
            return response()->json(self::SUCCESS);
        return response()->json(self::FAILURE);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FoodsType  $foodsType
     * @return \Illuminate\Http\Response
     */
    public function destroy(FoodsType $foodsType)
    {
        return ($foodsType->delete()) ? response()->json(self::SUCCESS) : response()->json(self::FAILURE);
    }
}
