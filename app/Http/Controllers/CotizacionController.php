<?php

namespace App\Http\Controllers;

use App\Producto;
use App\Clientes;
use App\Cotizacion;
use Session;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Orden_de_compra;

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
    ->select('cotizacion.ID_COTIZACION','cotizacion.ESTADO','cotizacion.FECHA_RESPUESTA_COTIZACION','cotizacion.FECHA_LLEGADA','clientes.NOMBRE_COMPLETO','cotizacion.DESCRIPCION','cotizacion.COD_PETICION_OFERTA')

    ->join('clientes', 'cotizacion.RUT_CLIENTE', '=', 'clientes.RUT_CLIENTE')
    ->get();
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

    public function create_orden($ID_COTIZACION = null){

        $cotizacion = Cotizacion::findOrFail($ID_COTIZACION);
      
        /*$orden = \DB::table('cargo_personal')
        ->select('*')
        ->join('personal','cargo_personal.RUTP','=','personal.RUTP')
        ->join('cargo','cargo.ID_CARGO','=','cargo_personal.ID_CARGO')
        ->where('personal.RUTP', '=', $RUTP)
        ->get();*/
        //dd($carg);
       // dd($cargos);
        return view('cotizacion.guia')->with('cotizacion',$cotizacion);
    }
    public function store_orden(Request $request){
        
        if($request->hasFile('ruta')!=null){
                    
            $file = $request->file('ruta');
            $name = time().$file->getClientOriginalName();
        
            $file->move(public_path().'/orden_compra_cliente/',$name);  
        }

        if( $cotizacion = Cotizacion::find($request->Input('id_cot')) and  $cotizacion->ID_ORDEN_COMPRA == "" ){ 
        $orden = new Orden_de_compra;
        $orden->RUT_CLIENTE = $request->Input('run_c');
        $orden->NUM_ORDEN_COMPRA = $request->Input('num_orden');
        $orden->FECHA_INGRESO = Carbon::now();
        $orden->RUTA = $name;
        
        if($orden->save()){ 
        $cotizacion = Cotizacion::find($request->Input('id_cot'));
        $cotizacion->ID_ORDEN_COMPRA = $orden->ID_ORDEN_COMPRA;
      
        $cotizacion->save();
        Session::flash('message','Guardado Correctamente');
        Session::flash('class','success');
        }
    }else{
        Session::flash('message','Esta cotizacion ya tiene una Orden de compra asignada');
        Session::flash('class','danger');
    }
        
        return view('cotizacion.guia')->with('cotizacion',$cotizacion);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cotizacion = new Cotizacion;
        
        $cotizacion->RUT_CLIENTE =$request->Input('cliente');
        $cotizacion->COD_PETICION_OFERTA =$request->Input('codigo_pet_oferta');
        $cotizacion->FECHA_LLEGADA = Carbon::now();
        $cotizacion->FECHA_RESPUESTA_COTIZACION =$request->Input('fecha_resp_coti');
        $cotizacion->DESCRIPCION =$request->Input('descripcion_cot');
        $cotizacion->ESTADO ="En Espera";
        if ($cotizacion->save()) {
         
            $desc =$request->descripcion;
            $count = count($desc);

            
            $files = $request->all();
            $ff="";
            for($i = 0; $i < $count; $i++){
                $name = null;
                
                $producto = new Producto;
               

             
                if($request->hasFile('plano')!=null){
                    
                    $file = $request->file('plano');
                    if(array_key_exists($i, $file)){


                    $name = time().$file[$i]->getClientOriginalName();
                    $ff=$ff."-".$name;
                    $file[$i]->move(public_path().'/planos/',$name);
                    
                } }
            
              
               $producto->DESCRIPCION=$request->descripcion[$i];
               $producto->TIPO_PRODUCTO=$request->tipo[$i];
               $producto->PLANO_PRODUCTO=$name;
               $producto->FECHA_DE_ENTREGA_PRODUCTO=$request->fecha_entrega[$i];
               $producto->ESTADO="Falta Cotizacion";
        
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

        return redirect()->route('cotizacion.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cotizacion  $cotizacion
     * @return \Illuminate\Http\Response
     */
    public function show2(){
        $orden = \DB::table('orden_de_compra')
        ->select('RUTA')
        ->join('cotizacion','orden_de_compra.ID_ORDEN_COMPRA','=','cotizacion.ID_ORDEN_COMPRA')
        ->where('cotizacion.ID_COTIZACION', '=', 27)
        ->get();   
        return view('cotizacion.show')->with('orden',$orden);
    }

    public function show( $ID_COTIZACION = null)
    {
        $cotizacion =  Cotizacion::where('ID_COTIZACION', $ID_COTIZACION)->first();
        $orden = \DB::table('orden_de_compra')
        ->select('*')
        ->join('cotizacion','orden_de_compra.ID_ORDEN_COMPRA','=','cotizacion.ID_ORDEN_COMPRA')
        ->where('cotizacion.ID_COTIZACION', '=', $ID_COTIZACION)
        ->get();
     
       
        return view('cotizacion.show')->with('cotizacion',$cotizacion)->with('orden',$orden);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cotizacion  $cotizacion
     * @return \Illuminate\Http\Response
     */
    public function edit($ID_COTIZACION = null)
    {
        $cotizacion = Cotizacion::findOrFail($ID_COTIZACION);
        $clientes = Clientes::all();
     
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
