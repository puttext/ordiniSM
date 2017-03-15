<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    	$this->dati["gas"]=\App\Model\Gas::all()->pluck("full_name","id");
    	$this->dati["fornai"]=\App\Model\Fornaio::all()->pluck("full_name","id");
    	$this->dati["ruoli"]=\App\Model\BaseModel::getEnumValues("users","ruolo");
    	$this->dati["user"]=User::find($id);
    	$this->dati["disable"]=(\Auth::user()->livello<User::GESTORE)?"disabled":null;
    	$this->dati["disable_coord"]=(\Auth::user()->livello<User::COORDINATORE)?"disabled":null;
    	 
    	//dd(\Auth::user()->livello,$this->dati);
    	return view("user.edit")->with($this->dati);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user=User::find($id);
        $user->fill($request->input());
        $user->save();
        return redirect(route("user.edit",$id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
