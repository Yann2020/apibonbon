<?php

namespace App\Http\Controllers;

use App\Models\ItemsToSale;
use Illuminate\Http\Request;

class ItemsToSaleController extends Controller
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
        $itemsToSale = ItemsToSale::with("stockItemsToSale")->orderByDesc("created_at")->get();
        return response()->json($itemsToSale);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(ItemsToSale::create($request->all()))
            return response()->json(self::SUCCESS);
        return response()->json(self::FAILURE);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ItemsToSale  $itemsToSale
     * @return \Illuminate\Http\Response
     */
    public function show(ItemsToSale $itemsToSale)
    {
        $itemsToSale = $itemsToSale->with("admin","specie","stockItemsToSale","sales")->first();
        return response()->json($itemsToSale);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ItemsToSale  $itemsToSale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ItemsToSale $itemsToSale)
    {
        if($itemsToSale->update($request->all()))
            return response()->json(self::SUCCESS);
        return response()->json(self::FAILURE);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ItemsToSale  $itemsToSale
     * @return \Illuminate\Http\Response
     */
    public function destroy(ItemsToSale $itemsToSale)
    {
        return ($itemsToSale->delete()) ? response()->json(self::SUCCESS) : response()->json(self::FAILURE);
    }
}
