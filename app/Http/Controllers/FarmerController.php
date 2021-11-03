<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Farmer;
use Exception;
use Illuminate\Http\Request;

class FarmerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $farmer = Account::where("type","farmer")->orderByDesc("created_at")->get();
        return response()->json($farmer,200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return app(AccountController::class)->store($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  id int $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        try{
            $farmer = Account::where("id",$id)->first();
            $farmerWithRelation = Farmer::with("admin","specie")->findOrFail($farmer->id);
            $data = array($farmer, $farmerWithRelation);
            return response()->json($data);
        }
        catch(Exception $e)
        {
            return $e->getMessage();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  id int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        return app(AccountController::class)->update($request,$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  id int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        if(Farmer::find($id)->delete())
            return app(AccountController::class)->destroy($id);
        return response()->json(["status" => "failure to delete farmer identifier"]);
    }
}
