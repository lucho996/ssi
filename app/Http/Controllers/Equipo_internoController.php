<?php

namespace App\Http\Controllers;

use App\Equipos_y_o_herramientas;
use App\Producto;
use App\Inventario;
use Session;
use Illuminate\Http\Request;

class Equipo_internoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      //  $equipos_i = Equipos_y_o_herramientas::all();
        $equipos_i = \DB::table('equipos_y_o_herramientas')
        ->select('producto.DESCRIPCION','inventario.NOMBRE','equipos_y_o_herramientas.ID_EH','equipos_y_o_herramientas.UNIDAD_E','equipos_y_o_herramientas.CANTIDAD_DIAS_E','equipos_y_o_herramientas.VALOR_TOTAL_E')
        ->join('producto', 'equipos_y_o_herramientas.ID_PRODUCTO', '=', 'producto.ID_PRODUCTO')
        ->join('inventario', 'equipos_y_o_herramientas.ID_INVENTARIO', '=', 'inventario.ID_INVENTARIO')
        ->get();
        //dd($equipos_i);
        return view('equipos_internos.index')->with('equipos_i',$equipos_i);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $inventario = Inventario::all();
        $producto = Producto::all();
        return view('equipos_internos.create')->with('inventario',$inventario)->with('producto',$producto);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $equipos_i = new Equipos_y_o_herramientas;
        $equipos_i->ID_INVENTARIO =$request->Input('inventario');
        $equipos_i->ID_PRODUCTO =$request->Input('producto');
        $equipos_i->UNIDAD_E ="Dia";
        $equipos_i->CANTIDAD_DIAS_E =$request->Input('cantidad');
        $equipos_i->VALOR_TOTAL_E =$request->Input('valor');
        try{
            if($equipos_i->save()){
                Session::flash('message','Guardado Correctamente');
                Session::flash('class','success');
            }else{
                Session::flash('message','Ha ocurrido un error');
                Session::flash('class','danger');
            }
            }catch(\Exception $e) {
            Session::flash('message',$e);
            Session::flash('class','danger');
            }
            return redirect()->route('equipos_internos.create');     
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Equipos_y_o_herramientas  $equipos_y_o_herramientas
     * @return \Illuminate\Http\Response
     */
    public function show(Equipos_y_o_herramientas $equipos_y_o_herramientas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Equipos_y_o_herramientas  $equipos_y_o_herramientas
     * @return \Illuminate\Http\Response
     */
    public function edit(Equipos_y_o_herramientas $equipos_y_o_herramientas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Equipos_y_o_herramientas  $equipos_y_o_herramientas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Equipos_y_o_herramientas $equipos_y_o_herramientas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Equipos_y_o_herramientas  $equipos_y_o_herramientas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Equipos_y_o_herramientas $equipos_y_o_herramientas)
    {
        //
    }
}
