<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;

class FoodController extends Controller
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
        $foods = Food::with("admin","itemsToTake","foodStock")->orderByDesc("created_at")->get();
        return response()->json($foods);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Food::create($request->all()))
            return response()->json(self::SUCCESS);
        return response()->json(self::FAILURE);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function show(Food $food)
    {
        return response()->json($food->with("admin","itemsToTake","foodStock")->findOrFail($food->id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Food $food)
    {
        if($food->update($request->all()))
            return response()->json(self::SUCCESS);
        return response()->json(self::FAILURE);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function destroy(Food $food)
    {
        return ($food->delete()) ? response()->json(self::SUCCESS) : response()->json(self::FAILURE);
    }
}
