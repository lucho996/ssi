<?php

namespace App\Http\Controllers;

use App\Iva;
use Illuminate\Http\Request;
use Carbon\Carbon;
class IvaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $iva = \DB::table('iva')
        ->select('ID_IVA','IVA','FECHA','ESTADO')
        ->get();   
        return view('iva.index')->with('iva',$iva);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('iva.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        \DB::table('iva')->update(array(
            'ESTADO'=>'Inactivo',
         ));

        $iv = new IVA;
        $iv->IVA=$request->Input('iva');
        $iv->FECHA=Carbon::now();
        $iv->ESTADO = "Activo";
        $iv->save();
        return redirect()->route('iva.index');
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Iva  $iva
     * @return \Illuminate\Http\Response
     */
    public function show(Iva $iva)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Iva  $iva
     * @return \Illuminate\Http\Response
     */
    public function edit(Iva $iva)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Iva  $iva
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Iva $iva)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Iva  $iva
     * @return \Illuminate\Http\Response
     */
    public function destroy(Iva $iva)
    {
        //
    }
}
