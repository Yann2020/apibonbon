<?php

namespace App\Http\Controllers;

use App\Models\StockItemsToSale;
use Illuminate\Http\Request;

class StockItemsToSaleController extends Controller
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
        return response()->json(StockItemsToSale::orderByDesc("created_at")->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(StockItemsToSale::create($request->all()))
            return response()->json(self::SUCCESS);
        return response()->json(self::FAILURE);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StockItemsToSale  $stockItemsToSale
     * @return \Illuminate\Http\Response
     */
    public function show(StockItemsToSale $stockItemsToSale)
    {
        return response()->json($stockItemsToSale->with("itemsToSale","farmer")->first());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StockItemsToSale  $stockItemsToSale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StockItemsToSale $stockItemsToSale)
    {
        if($stockItemsToSale->update($request->all()))
            return response()->json(self::SUCCESS);
        return response()->json(self::FAILURE);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StockItemsToSale  $stockItemsToSale
     * @return \Illuminate\Http\Response
     */
    public function destroy(StockItemsToSale $stockItemsToSale)
    {
        return ($stockItemsToSale->delete()) ? response()->json(self::SUCCESS) : response()->json(self::FAILURE);
    }
}
