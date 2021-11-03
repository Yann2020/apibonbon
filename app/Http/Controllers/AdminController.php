<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin = Account::where("type","admin")->orderByDesc("created_at")->get();
        return response()->json($admin,200);
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
        #return $id;
        $accountInfo = Account::find($id)->first();
        $admin = Admin::with("species","batches","breeds")->find($id);
        #$data = [1 => $accountInfo];
        #$data += ["relations" => $admin];
        $data = array($accountInfo,$admin);
        return response()->json($data);
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
        # there i try to call update method of Account Controller within this 
        return app("App\Http\Controllers\AccountController")->update($request,$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  id int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        if(Admin::find($id)->delete())
            return app(AccountController::class)->destroy($id);
        return response()->json(["status" => "failure to delete admin identifier"]);
    }
}
