<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use App\User;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Supplier::where('deleted', 0)->orderByDesc('created_at')->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Supplier::create($request->all()))
            return response()->json(["status" => "success"], 200);
        return response()->json(["status" => "fail"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        $user = new User();
        return (!$user->isDeleted($supplier)) ? response()->json($supplier->with("admin")->find($supplier->id)) : response()->json(['status'=>'deleted']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supplier $supplier)
    {
        if($supplier->update($request->all()))
            return response()->json(['status' => 'success']);
        return response()->json(['status'=>'fail']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier)
    {
        return $supplier->update(['deleted'=>1]) ? response()->json(['status'=>'success']) : response()->json(['status' => 'fail']);
    }
}
