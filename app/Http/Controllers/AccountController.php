<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Admin;
use App\Models\Farmer;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Account::orderByDesc("created_at")->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        if($request->input("type") == "admin"):
            if(Account::create($request->all()))
                $account = Account::latest()->firstOrfail();
                Admin::create(
                    ["id" => $account->id]
                );
                return response()->json(["status"=>"success"],200);
            return response()->json(["status"=>"fail"]);
        elseif ($request->input("type") == "farmer"):
            # In that case we're trying to create the farmer account

            if(Account::create($request->all()))
                $account = Account::latest()->firstOrfail();
                Farmer::create(["id" => $account->id,"admin_id" => $request->input("admin_id"),"specie_id" => $request->input("specie_id")]);
                return response()->json(["status"=>"success"],200);
            return response()->json(["status"=>"fail"]);
            #DB::delete('delete users where name = ?', ['John'])
        endif;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function show(Account $account)
    {
        return response()->json($account->first());
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
        $account = Account::find($id);
        if($account->update($request->all()))
            return response()->json(["status"=>"has been updated successfully"]);
        return response()->json(["status"=>"fail to update"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  id int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $account = Account::find($id)->first();
        return ($account->delete()) ? response()->json(["status"=>"deleted"]) : response()->json(["status"=>"fail"]);

    }
}
