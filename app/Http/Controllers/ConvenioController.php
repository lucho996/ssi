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
           
           $producto->ESTADO_CONV="CONVENIO";
           $producto->ESTADO="FALTA COTIZACION"; 
           $producto->save();
           $id=$convenio->ID_CONVENIO;
           $id_product= $producto->ID_PRODUCTO;
            
           $dc = new Detalle_Convenio;
           $dc->ID_CONVENIO = $id;
           $dc->ID_PRODUCTO = $id_product;
           $dc->UNIDAD=$request->unidad[$i];
           $dc->CANTIDAD = $request->cantidad[$i];
           $dc->PRECIO_UNITARIO = $request->cantidad[$i];
          $dc->UNIDAD=$request->unidad[$i];
           $dc->save();
                
           
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
        $convenio= Convenio::where('ID_CONVENIO',$ID_CONVENIO)->first();
        return view('convenio.show')->with('convenio',$convenio);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($ID_CONVENIO)
    {
        
        $cc = Cliente_Convenio::findOrFail($RUT_CLIENTE);
        $convenio = Convenio::findOrFail($ID_CONVENIO);
        return view('convenio.edit')->with('convenio',$convenio);
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
        //
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
