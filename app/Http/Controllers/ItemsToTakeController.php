<?php

namespace App\Http\Controllers;

use App\Models\ItemsToTake;
use App\Models\Food;
use App\Models\FoodsStock;
use Illuminate\Http\Request;

class ItemsToTakeController extends Controller
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
        return response()->json(ItemsToTake::orderByDesc('created_at')->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $total_take = (int) $request->input('total_take');
        $foodStock = FoodsStock::where('food_id', (int)$request->input('food_id'))->first();
        if((int)$foodStock->quantity > 0 or (int)$foodStock->quantity > $total_take):
            $actaul_stock = (int) $foodStock->quantity - $total_take;
            $foodStock->update(['quantity' => $actaul_stock]);
        else:
            return response()->json(['status' => 'failure','message' => 'your request can\'t not complete cause, your reduction is more big than the availible quantity']);
        endif;
        
        if(ItemsToTake::create($request->all()))
            $latestSave = ItemsToTake::latest()->first();
            $latestSave->batches()->attach($request->input('batche_id'));
            return response()->json(self::SUCCESS);
        return response()->json(self::FAILURE);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ItemsToTake  $itemsToTake
     * @return \Illuminate\Http\Response
     */
    public function show(ItemsToTake $itemsToTake)
    {
        $itemsToTake = ItemsToTake::with("farmer","foods","batches")->find($itemsToTake->id);
        return response()->json($itemsToTake);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ItemsToTake  $itemsToTake
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ItemsToTake $itemsToTake)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ItemsToTake  $itemsToTake
     * @return \Illuminate\Http\Response
     */
    public function destroy(ItemsToTake $itemsToTake)
    {
        return ($itemsToTake->delete()) ? response()->json(self::SUCCESS) : response()->json(self::FAILURE);
    }
}
