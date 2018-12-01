<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Clientes;
use App\Producto;
use App\Cliente_Convenio;
use App\Detalle_Convenio;
use App\Convenio;
use Session;
use App\Orden_de_compra;
class ConvenioController extends Controller

{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
        $convenio = \DB::table('cliente_convenio')
        ->select('*')
        ->join('clientes','cliente_convenio.RUT_CLIENTE','=','clientes.RUT_CLIENTE')
        ->join('convenios','cliente_convenio.ID_CONVENIO','=','convenios.ID_CONVENIO')
        ->get();
        return view('convenio.index')->with('convenio',$convenio);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientes = Clientes::all();
        return view('convenio.create')->with('clientes',$clientes);
    }
    public function create2()
    {
        $clientes = Clientes::all();
        return view('convenio.cotizarconvenio')->with('clientes',$clientes);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

 
        $clientes = Clientes::all();
        $convenio = new Convenio;
        $convenio->N_CONVENIO=$request->Input('numero_convenio');
        $convenio->FECHA_EMISION=$request->Input('fecha_emision');
        $convenio->FECHA_INICIO= $request->Input('fecha_inicio');
        $convenio->FECHA_TERMINO=$request->Input('fecha_final');
        $convenio->CONDICION_PAGO=$request->Input('condicion_pago');
        $convenio->NOMBRE_PERSONA_ACARGO=$request->Input('nombre_persona');
        $convenio->NUMERO_PERSONA=$request->Input('telefono_persona');
        $convenio->CORREO_PERSONA=$request->Input('correo_persona');
       

        if($convenio->save()){
            $suma = 0;
            $id=$convenio->ID_CONVENIO;
            $cc = new Cliente_Convenio;
            $cc->ID_CONVENIO = $id;
            $cc->RUT_CLIENTE = $request->cliente;
            $cc->save();
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
                    
                }}
                $producto->CODIGO_SAP=$request->codsap[$i];
               $producto->DESCRIPCION=$request->descripcion[$i];
               $producto->PLANO_PRODUCTO=$name;
               $producto->TOTAL=$request->precio_unitario[$i];
               $producto->ESTADO_CONV="CONVENIO";
               $producto->ESTADO="COTIZADO"; 
        
               $producto->save();
               $id=$convenio->ID_CONVENIO;
               $id_product= $producto->ID_PRODUCTO;
                
               $dc = new Detalle_Convenio;
               $dc->ID_CONVENIO = $id;
               $dc->ID_PRODUCTO = $id_product;
               $dc->UNIDAD=$request->unidad[$i];
               $dc->CANTIDAD = $request->cantidad[$i];
               $dc->VALOR_UNITARIO = $producto->TOTAL;
               $dc->TOTAL =  $request->cantidad[$i] * $request->precio_unitario[$i];
               
               $dc->save();
                    
               $hola = \DB::table('detalle_convenio')
               ->select(\DB::raw('SUM(VALOR_UNITARIO*CANTIDAD)AS TOTAL'))
               ->where('ID_CONVENIO','=', $id)
               ->pluck('TOTAL')->first();
               $dato = $hola;
                  \DB::table('convenios')->where('ID_CONVENIO',$id)->update(array(
                   'TOTAL'=>$dato,
           ));
        }
            Session::flash('message','Guardado Correctamente');
            Session::flash('class','success');
        }else{
            Session::flash('message','Ha ocurrido un error');
            Session::flash('class','danger');
        }
        return redirect()->route('convenio.create');
        
    
}
public function store3(Request $request)
{
    $iva = \DB::table('iva')
    ->select('ID_IVA')
    ->where('ESTADO','=','Activo')
    ->pluck('ID_IVA')->first();

    
    $clientes = Clientes::all();
    $convenio = new Convenio;
    $convenio->N_CONVENIO=$request->Input('numero_convenio');
    $convenio->FECHA_EMISION=$request->Input('fecha_emision');
    $convenio->FECHA_INICIO= $request->Input('fecha_inicio');
    $convenio->FECHA_TERMINO=$request->Input('fecha_final');
    $convenio->CONDICION_PAGO=$request->Input('condicion_pago');
    $convenio->NOMBRE_PERSONA_ACARGO=$request->Input('nombre_persona');
    $convenio->NUMERO_PERSONA=$request->Input('telefono_persona');
    $convenio->CORREO_PERSONA=$request->Input('correo_persona');
    $convenio->ID_IVA=$iva;

    if($convenio->save()){
        $idconv=$convenio->ID_CONVENIO;
        $suma = 0;
        $id=$convenio->ID_CONVENIO;
        $cc = new Cliente_Convenio;
        $cc->ID_CONVENIO = $id;
        $cc->RUT_CLIENTE = $request->cliente;
        $cc->save();


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
                
            }}
           $producto->CODIGO_SAP=$request->codsap[$i];
           $producto->DESCRIPCION=$request->descripcion[$i];
           $producto->PLANO_PRODUCTO=$name;
           
           $producto->ESTADO_CONV="CONVENIO";
           $producto->ESTADO="FALTA COTIZACION"; 
           $producto->save();
           
              $id_prod = $producto->ID_PRODUCTO;
            $detalle_conv = new Detalle_Convenio;
            $detalle_conv->ID_PRODUCTO = $id_prod;
            $detalle_conv->ID_CONVENIO = $idconv;
            $detalle_conv->UNIDAD = $request->unidad[$i];
            $detalle_conv->CANTIDAD = $request->cantidad[$i];
            $detalle_conv->save();
        
                
           
    }
        Session::flash('message','Guardado Correctamente');
        Session::flash('class','success');
    }else{
        Session::flash('message','Ha ocurrido un error');
        Session::flash('class','danger');
    }
    return redirect()->route('convenio.index');
    
}
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($ID_CONVENIO = null)
    {




        
   
        

        $cotizacion = \DB::table('convenios')


        ->select('convenios.FECHA_INICIO','convenios.FECHA_TERMINO','convenios.TOTAL',
        'convenios.NETO','convenios.N_CONVENIO','convenios.CONDICION_PAGO','convenios.NUMERO_PERSONA',
        'convenios.CORREO_PERSONA','clientes.NOMBRE_COMPLETO','convenios.NOMBRE_PERSONA_ACARGO' )


        ->join('cliente_convenio','convenios.ID_CONVENIO','=','cliente_convenio.ID_CONVENIO')
        ->join('clientes','cliente_convenio.RUT_CLIENTE','=','clientes.RUT_CLIENTE')
        ->where('convenios.ID_CONVENIO', '=', $ID_CONVENIO)
        ->get()->first();
        
        /*$orden = \DB::table('convenios')
        ->select('*')
        ->join('orden_de_compra','cotizacion.ID_ORDEN_COMPRA','=','orden_de_compra.ID_ORDEN_COMPRA')
        ->where('cotizacion.ID_COTIZACION', '=', $ID_COTIZACION)
        ->get();
        */
        $iva = \DB::table('iva')
        ->select('IVA')
        ->where('ESTADO', '=', 'Activo')
        ->get();
 
        
        return view('convenio.show')->with('cotizacion',$cotizacion)->with('iva',$iva);

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($ID_CONVENIO = null )
    {
        $convenio = \DB::table('convenios')
        ->select('cliente_convenio.RUT_CLIENTE','convenios.ID_CONVENIO','convenios.FECHA_INICIO','convenios.FECHA_TERMINO','convenios.TOTAL',
        'convenios.NETO','convenios.N_CONVENIO','convenios.CONDICION_PAGO','convenios.NUMERO_PERSONA',
        'convenios.CORREO_PERSONA','clientes.NOMBRE_COMPLETO','convenios.NOMBRE_PERSONA_ACARGO' )
        ->join('cliente_convenio','convenios.ID_CONVENIO','=','cliente_convenio.ID_CONVENIO')
        ->join('clientes','cliente_convenio.RUT_CLIENTE','=','clientes.RUT_CLIENTE')
        ->where('convenios.ID_CONVENIO', '=', $ID_CONVENIO)
        ->get()->first();

        $clientes = Clientes::all();
        
        return view('convenio.edit')->with('convenio',$convenio)->with('clientes',$clientes)->with('ID_CONVENIO',$ID_CONVENIO);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function create_ordenc($ID_CONVENIO = NULL){
     
        $convenio = \DB::table('convenios')
        ->select('cliente_convenio.RUT_CLIENTE','convenios.ID_CONVENIO')
        ->join('cliente_convenio','convenios.ID_CONVENIO','=','cliente_convenio.ID_CONVENIO')
        ->join('clientes','cliente_convenio.RUT_CLIENTE','=','clientes.RUT_CLIENTE')
        ->where('convenios.ID_CONVENIO', '=', $ID_CONVENIO)
        ->get()->first();
            

        return view('convenio.guia')->with('convenio',$convenio);
    }

    public function store_ordenc_convenio(Request $request){
        
        if($request->hasFile('ruta')!=null){
                    
            $file = $request->file('ruta');
            $name = time().$file->getClientOriginalName();
        
            $file->move(public_path().'/orden_compra_cliente/',$name);  
        }

        if( $convenio = Convenio::find($request->Input('id_cot')) and  $convenio->ID_ORDEN_COMPRA == "" ){ 
        $orden = new Orden_de_compra;
        $orden->RUT_CLIENTE = $request->Input('run_c');
        $orden->NUM_ORDEN_COMPRA = $request->Input('num_orden');
        $orden->FECHA_INGRESO = Carbon::now();
        $orden->RUTA = $name;
        
        if($orden->save()){ 
        $convenio = Convenio::find($request->Input('id_cot'));
        $convenio->ID_ORDEN_COMPRA = $orden->ID_ORDEN_COMPRA;
      
        $convenio->save();
        Session::flash('message','Guardado Correctamente');
        Session::flash('class','success');
        }
    }else{
        Session::flash('message','Esta cotizacion ya tiene una Orden de compra asignada');
        Session::flash('class','danger');
    }
        
        return view('convenio.guia')->with('convenio',$convenio);
    }

    public function update(Request $request)
    {
        $ID_CONVENIO=$request->Input('ID_CONVENIO');
        $clientes = Clientes::all();
        $convenio =  Convenio::find($ID_CONVENIO);
        $convenio->FECHA_INICIO =$request->Input('fecha_inicio');
        $convenio->FECHA_TERMINO =$request->Input('fecha_final');
        $convenio->N_CONVENIO =$request->Input('n_convenio');
        $convenio->CONDICION_PAGO =$request->Input('condicion_pago');
        $convenio->NOMBRE_PERSONA_ACARGO =$request->Input('nombre_persona');
        $convenio->NUMERO_PERSONA =$request->Input('telefono_persona');
        $convenio->CORREO_PERSONA =$request->Input('correo_persona');
        try{
        if($convenio->save()){
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
        return view('convenio.edit',compact('ID_CONVENIO'))->with('clientes',$clientes)->with('convenio',$convenio);
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
