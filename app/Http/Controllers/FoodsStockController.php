<?php

namespace App\Http\Controllers;

use App\Models\FoodsStock;
use Illuminate\Http\Request;

class FoodsStockController extends Controller
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
        $foodsStock = FoodsStock::with("admin","food")->get();
        return response()->json($foodsStock,200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(FoodsStock::create($request->all()))
            return response()->json(self::SUCCESS);
        return response()->json(self::FAILURE);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $foodsStock = FoodsStock::with("admin","foodType","food")->findOrFail($id);
        return response()->json($foodsStock);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FoodsStock  $foodsStock
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FoodsStock $foodsStock)
    {
        if($foodsStock->update($request->all()))
            return response()->json(self::SUCCESS);
        return response()->json(self::FAILURE);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FoodsStock  $foodsStock
     * @return \Illuminate\Http\Response
     */
    public function destroy(FoodsStock $foodsStock)
    {
        return ($foodsStock->delete()) ? response()->json(self::SUCCESS) : response()->json(self::FAILURE);
    }
}
