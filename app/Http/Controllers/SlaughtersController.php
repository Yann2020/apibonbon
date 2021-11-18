<?php

namespace App\Http\Controllers;

use App\Models\Slaughters;
use App\Models\Batche;
use App\Models\ItemsToSale;
use App\Models\Specie;
use App\Models\StockItemsToSale;
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

        // Get the actual specie_id from the specie name
        $specie_id = (int) Specie::where('name',(string)$request->input('specie_name'))->value('id');

        //Get the specific itemsToSale id
        $itemsToSale_id = (int)ItemsToSale::where('specie_id', $specie_id)->where('name', 'freezing')->value('id');

        // get the specific stock for this slaughter
        $stockItemsToSale = StockItemsToSale::where('items_to_sale', $itemsToSale_id)->first();
        
        $batche = Batche::find((int)$request->input('batche_id'));
        if((int)$batche->total >= (int)$request->input('quantity')):
            // Reduct the total number of alive animals
            $toReduce = (int)$batche->total - (int)$request->input('quantity');
            if($batche->update(['total' => $toReduce]))
                // Provide the specified stock of items to sale
                $toAdd = (int)$stockItemsToSale->quantity + (int)$request->input('quantity');
                $stockItemsToSale->update(['quantity' => $toAdd]);
                //Store a newly created Slaughter
                if(Slaughters::create($request->all()))
                    $slaughters = Slaughters::latest()->first();
                    $slaughters->batche()->attach((int)$request->input('batche_id'));
                    return response()->json(self::SUCCESS);
                return response()->json(self::FAILURE);
                
            return response()->json(['status' => 'failure', 'message' => 'cause the batche can\'t be update']);
        else:
            return response()->json(self::FAILURE);
        endif;
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slaughters  $slaughters
     * @return \Illuminate\Http\Response
     */
    public function show(Slaughters $slaughters)
    {
        $slaughters = $slaughters->with("farmer","stock","batche")->find($slaughters->id);
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
