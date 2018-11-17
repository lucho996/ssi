<?php

namespace App\Http\Controllers;
use App\Producto;
use App\Clientes;
use App\Cotizacion;
use App\Inventario;
use App\Personal;
use App\Proveedor;
use Session;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($ID_COTIZACION = null)
    {
        //dd($ID_COTIZACION);

        $producto = \DB::table('detalle_cotizacion')
        ->select('detalle_cotizacion.ID_COTIZACION','cotizacion.ID_COTIZACION','producto.ID_PRODUCTO','producto.DESCRIPCION','producto.TIPO_PRODUCTO','producto.PLANO_PRODUCTO','producto.FECHA_DE_ENTREGA_PRODUCTO')
        ->join('cotizacion','detalle_cotizacion.ID_COTIZACION', '=','cotizacion.ID_COTIZACION')
        ->join('producto','detalle_cotizacion.ID_PRODUCTO', '=','producto.ID_PRODUCTO')
        ->where('cotizacion.ID_COTIZACION', '=',$ID_COTIZACION )
        ->get();
        return view('producto.index')->with('producto',$producto);
        
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request,$ID_PRODUCTO)
    {

        
        $inventario= Inventario::all();
        $personal=Personal::all();
        $producto = Producto::findOrFail($ID_PRODUCTO);
        $clientes = Clientes::all();
        $proveedor=Proveedor::all();
        $cargo = \DB::table('cargo')
        ->select('*')
        ->get();
        return view('producto.create')->with('clientes',$clientes)->with('producto',$producto)->with(compact('personal'))->with('proveedor',$proveedor)->with('inventario',$inventario)->with('cargo',$cargo);
    }

    public function personalcargo(Request $request){
    
        $cargo = $request->Input('id_cargo');
        $persona = \DB::table('cargo_personal')
        ->select('*')
        ->join('personal','cargo_personal.RUTP', '=','personal.RUTP')
        ->join('cargo','cargo_personal.ID_CARGO', '=','cargo.ID_CARGO')
        ->where('cargo_personal.ID_CARGO','=',$cargo)
        ->get();

        return response()->json($persona);
      }
      
      public function findPrice(Request $request){
      
        $data=Inventario::select('VALOR')->where('ID_INVENTARIO',$request->id)->first(); 
        return response()->json($data);
      }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store3(Request $request)
    {
        dd($request);
        
        return redirect()->route('producto.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($ID_PRODUCTO = null)
    {
        $producto =  Producto::where('ID_PRODUCTO', $ID_PRODUCTO)->first();

        return view('producto.show', [
            'producto' => $producto,
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($ID_PRODUCTO = null)
    {
        $clientes = Clientes::all();
        $producto = Producto::findOrFail($ID_PRODUCTO);
        return view('producto.edit',compact('producto'))->with('clientes',$clientes);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $ID_PRODUCTO = null)
    {
        $nameE = null;

        if($request->hasFile('plano')){
            $file = $request->file('plano');
            $nameE= time().$file->getClientOriginalName();
            $file->move(public_path().'/planos/',$nameE);
           
        }
        $clientes = Clientes::all();
        $producto =  Producto::find($ID_PRODUCTO);
        $producto->RUT_CLIENTE =$request->Input('cliente');
        $producto->DESCRIPCION =$request->Input('descripcion');
        $producto->COD_PETICION_OFERTA =$request->Input('codigo_pet_oferta');
        $producto->TIPO_PRODUCTO =$request->Input('tipo');
        $producto->PLANO_PRODUCTO =$nameE;
        $producto->FECHA_LLEGADA = Carbon::now();
        $producto->FECHA_RESPUESTA_COTIZACION =$request->Input('fecha_resp_coti');
        $producto->FECHA_DE_ENTREGA_PRODUCTO =$request->Input('fecha_entrega');
        $producto->ESTADO = "Falta Cotización";
        try{
        if($producto->save()){
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
        return view('producto.edit',compact('producto'))->with('clientes',$clientes);
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
