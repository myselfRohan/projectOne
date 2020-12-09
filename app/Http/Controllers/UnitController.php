<?php

namespace App\Http\Controllers;

use App\Unit;
use Illuminate\Http\Request;

class Unitcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('unit');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()

    {
        $units=Unit::all();
        return view('listunit')->with('units',$units);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $this->validate($request,[
            'name'=>'required'
        ]);
        $unit=new Unit();
        $unit->name=$request->name;
        $unit->save();
        session()->put('unitsuccess','Successfully Added');
        return redirect('unit');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function show(Unit $unit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $unit=Unit::find($id);
        
        return view('editunit')->with('unit',$unit);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $unit=Unit::find($id);
        $unit->name=$request->name;
        $unit->save();
        session()->put('updateunit','Successfully Updated');
        return redirect('unitlist');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $unit=Unit::find($id);
        $unit->delete();
        session()->put('deleteunit','Successfully deleted');
        return redirect('unitlist');
    }
}
