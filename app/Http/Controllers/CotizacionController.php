<?php

namespace App\Http\Controllers;

use App\Producto;
use App\Clientes;
use App\Cotizacion;
use Session;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CotizacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       //$cotizacion = Cotizacion::orderBy('ID_COTIZACION','ASC')->get();
       //dd($cotizacion);
       $cotizacion = \DB::table('cotizacion')
       ->select('cotizacion.ID_COTIZACION','cotizacion.FECHA_RESPUESTA_COTIZACION','cotizacion.FECHA_LLEGADA','clientes.NOMBRE_COMPLETO','cotizacion.DESCRIPCION','cotizacion.COD_PETICION_OFERTA')
       ->join('clientes', 'cotizacion.RUT_CLIENTE', '=', 'clientes.RUT_CLIENTE')
       ->get();
       //dd($cotizacion);
       return view('cotizacion.index')->with('cotizacion',$cotizacion);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientes = Clientes::all();
        return view('cotizacion.create')->with('clientes',$clientes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('plano')){
            $file = $request->file('plano');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/planos/',$name);
           
        }
        $cotizacion = new Cotizacion;
        
        $cotizacion->RUT_CLIENTE =$request->Input('cliente');
        $cotizacion->COD_PETICION_OFERTA =$request->Input('codigo_pet_oferta');
        $cotizacion->FECHA_LLEGADA = Carbon::now();
        $cotizacion->FECHA_RESPUESTA_COTIZACION =$request->Input('fecha_resp_coti');
        $cotizacion->DESCRIPCION =$request->Input('descripcion_cot');
        $cotizacion->ESTADO ="En Espera";
        //$detallac->ID_COTIZACION = $request->$cotizacion->ID_COTIZACION;
        if ($cotizacion->save()) {
         
            $desc =$request->descripcion;
            $count = count($desc);
            for($i = 0; $i < $count; $i++){
               $producto = new Producto;

               $producto->DESCRIPCION=$request->descripcion[$i];
               $producto->TIPO_PRODUCTO=$request->tipo[$i];
               $producto->PLANO_PRODUCTO=$request->plano[$i];
               $producto->FECHA_DE_ENTREGA_PRODUCTO=$request->fecha_entrega[$i];
               $producto->save();

                $id=$cotizacion->ID_COTIZACION;
                $id_product= $producto->ID_PRODUCTO;

                $cotizacion = Cotizacion::find($id);
                $cotizacion->productos()->attach($id_product);
            } 

            Session::flash('message','Guardado Correctamente');
            Session::flash('class','success');
        }else{
            Session::flash('message','Ha ocurrido un error');
            Session::flash('class','danger');
        }

       // $cotizacion->$detellac()

        /*try{
        if($producto->save() and $cotizacion->save()){
            Session::flash('message','Guardado Correctamente');
            Session::flash('class','success');
        }else{
            Session::flash('message','Ha ocurrido un error');
            Session::flash('class','danger');
        }
        }catch(\Exception $e) {
        Session::flash($e);
        Session::flash('class','danger');
        }*/
       // dd($producto->ID_PRODUCTO);

        //dd($producto, $cotizacion);
        return redirect()->route('cotizacion.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cotizacion  $cotizacion
     * @return \Illuminate\Http\Response
     */
    public function show( $ID_COTIZACION = null)
    {
        $cotizacion =  Cotizacion::where('ID_COTIZACION', $ID_COTIZACION)->first();

        return view('cotizacion.show', [
            'cotizacion' => $cotizacion,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cotizacion  $cotizacion
     * @return \Illuminate\Http\Response
     */
    public function edit($ID_COTIZACION = null)
    {
        $clientes = Clientes::all();
        $cotizacion = Cotizacion::findOrFail($ID_COTIZACION);
        return view('cotizacion.edit',compact('cotizacion'))->with('clientes',$clientes);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cotizacion  $cotizacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $ID_COTIZACION =null)
    {
        $clientes = Clientes::all();
        $cotizacion =  Cotizacion::find($ID_COTIZACION);
        $cotizacion->RUT_CLIENTE =$request->Input('cliente');
        $cotizacion->COD_PETICION_OFERTA =$request->Input('codigo_pet_oferta');
        $cotizacion->FECHA_RESPUESTA_COTIZACION =$request->Input('fecha_resp_coti');
        $cotizacion->ESTADO =$request->Input('estado');
        $cotizacion->DESCRIPCION =$request->Input('descripcion_cot');
        try{
        if($cotizacion->save()){
            Session::flash('message','Guardado Correctamente');
            Session::flash('class','success');
        }else{
            Session::flash('message','Ha ocurrido un error');
            Session::flash('class','danger');
        }
        }catch(\Exception $e) {
        Session::flash($e);
        Session::flash('class','danger');
        }
        return view('cotizacion.edit',compact('cotizacion'))->with('clientes',$clientes);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cotizacion  $cotizacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cotizacion $cotizacion)
    {
        //
    }
}
