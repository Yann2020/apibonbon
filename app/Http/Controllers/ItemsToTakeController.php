<?php

namespace App\Http\Controllers;

use App\Models\ItemsToTake;
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
        /**
         * PROBLEMES :
         * il faudra créer une boucle de création des éléments au cas ou le fermier veut prendre plusieurs aliments
         * il faudra aussi ceéer une autre boucle pour l'enregistrement dans la table pivot 
         */

        if(ItemsToTake::create($request->all()))
            $latestSave = ItemsToTake::latest()->first();
            $latestSave->batches()->attach($request->input('batche_id'));
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
