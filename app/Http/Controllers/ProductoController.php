<?php

namespace App\Http\Controllers;
use App\Producto;
use App\Clientes;
use App\Cotizacion;
use App\Inventario;
use App\Personal;
use App\OC_detalle;
use App\material;
use App\Orden_Compra_Mat;
use App\Equipos_y_o_herramientas;
use App\Equipo_y_o_herramienta_arrendados;
use App\Mano_Obra;
use App\Proveedor;
use App\Detalle_Convenio;
use Session;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Redirect;
use App\Detalle_C;

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
        ->select('detalle_cotizacion.UNIDAD','producto.ESTADO','producto.CODIGO_SAP','detalle_cotizacion.CANTIDAD','detalle_cotizacion.ID_COTIZACION','cotizacion.ID_COTIZACION','producto.ID_PRODUCTO','producto.DESCRIPCION','producto.TIPO_PRODUCTO','producto.PLANO_PRODUCTO','producto.FECHA_DE_ENTREGA_PRODUCTO')
        ->join('cotizacion','detalle_cotizacion.ID_COTIZACION', '=','cotizacion.ID_COTIZACION')
        ->join('producto','detalle_cotizacion.ID_PRODUCTO', '=','producto.ID_PRODUCTO')
        ->where('cotizacion.ID_COTIZACION', '=',$ID_COTIZACION )
        ->get();

        $coti = Cotizacion::find($ID_COTIZACION);


        
        return view('producto.index')->with('producto',$producto)->with('coti',$coti);
        
    }
     public function store_ocm(Request $request){

        
        
        $iva = \DB::table('iva')
        ->select('ID_IVA')
        ->where('ESTADO', '=','Activo' )
        ->pluck('ID_IVA')->first();
        
        $id_pro = $request->Input('id_producto');
        $rut = $request->Input('rut');
        $forma_pago = $request->Input('forma_pago');



        $orden_compra = new Orden_Compra_Mat;
        $orden_compra->ID_IVA=$iva;
        $orden_compra->CONDICIONES_PAGO= $forma_pago;
        $orden_compra->RUT= $rut;
        $orden_compra->ID_PRODUCTO= $id_pro;  
        $orden_compra->save(); 
        $id_oc=$orden_compra->ID_ORDEN_COMPRA;

        $ibtiva = \DB::table('orden_de_compra_mat')
        ->select('iva.IVA as IVA')
        ->join('iva','iva.ID_IVA', '=','orden_de_compra_mat.ID_IVA')
        ->where('orden_de_compra_mat.ID_ORDEN_COMPRA', '=',$id_oc)
        ->pluck('IVA')->first();


    
        $SUMA_MATERIAL = \DB::table('oc_detalle')
        ->select(\DB::raw('SUM(oc_detalle.TOTAL)AS TOTAL'))
        ->join('proveedor','oc_detalle.RUT', '=','proveedor.RUT')
        ->join('material','oc_detalle.ID_MATERIAL', '=','material.ID_MATERIAL')
        ->where('material.ID_PRODUCTO', '=',$id_pro)
        ->where('proveedor.RUT', '=',$rut )
        ->pluck('TOTAL')->first();


        
        $ivaa=($SUMA_MATERIAL * $ibtiva)/100;
        $total_mas_iva= $ivaa+$SUMA_MATERIAL;

           \DB::table('orden_de_compra_mat')->where('ID_ORDEN_COMPRA',$id_oc)->update(array(
            'VALOR_NETO'=>$SUMA_MATERIAL, 'VALOR_TOTAL'=>$total_mas_iva,'FECHA_EMISION'
            =>Carbon::now(),
    ));

 

    \DB::table('oc_detalle')
    ->join('proveedor','oc_detalle.RUT', '=','proveedor.RUT')
    ->join('material','oc_detalle.ID_MATERIAL', '=','material.ID_MATERIAL')
    ->where('material.ID_PRODUCTO','=',$id_pro)
    ->where('proveedor.RUT','=',$rut)
    ->update(array(
        'material.ESTADO'=>'OC-GENERADA',
));




        return Redirect::back();
     }

    public function store_pro2(Request $request){

    
        $product = new Producto;
        $name = null;
        if($request->hasFile('plano')){
        $file = $request->file('plano');
        $name= time().$file->getClientOriginalName();
        $file->move(public_path().'/planos/',$name);
        }
        
        $product->DESCRIPCION = $request->Input('descripcion');
        $product->PLANO_PRODUCTO = $name;
        $product->TOTAL = $request->Input('precio_unitario');
        $product->ESTADO_CONV = "CONVENIO";
        if($product->save()){
            $id_pro = $product->ID_PRODUCTO;
            $convenio = new Detalle_Convenio;
            $convenio->ID_PRODUCTO=$id_pro;
            $convenio->ID_CONVENIO=$request->Input('id_convenio');
            $convenio->CANTIDAD=$request->Input('cantidad');
            $convenio->VALOR_UNITARIO=$request->Input('precio_unitario');
            $convenio->TOTAL=$request->Input('cantidad') * $request->Input('precio_unitario') ;
            $convenio->save();
        }
        $hola = \DB::table('detalle_convenio')
        ->select(\DB::raw('SUM(VALOR_UNITARIO*CANTIDAD)AS TOTAL'))
        ->where('ID_CONVENIO','=', $request->Input('id_convenio'))
        ->pluck('TOTAL')->first();
    
        $dato = $hola;
           \DB::table('convenios')->where('ID_CONVENIO',$request->Input('id_convenio'))->update(array(
            'TOTAL'=>$dato,
    ));
    return Redirect::back();   
    }
    
    public function store_pro(Request $request){
        
        $product = new Producto;
        $name = null;
        if($request->hasFile('plano')){
        $file = $request->file('plano');
        $name= time().$file->getClientOriginalName();
        $file->move(public_path().'/planos/',$name);
        }
        $product->CODIGO_SAP=$request->Input('codsap');
        $product->DESCRIPCION = $request->Input('descripcion');
        $product->PLANO_PRODUCTO = $name;
        $product->TOTAL = $request->Input('precio_unitario');
        $product->ESTADO_CONV = "CONVENIO";
        
           
           $product->ESTADO_CONV="CONVENIO";
           $product->ESTADO="FALTA COTIZACION"; 
        if($product->save()){
            $id_pro = $product->ID_PRODUCTO;
            $convenio = new Detalle_Convenio;
            $convenio->ID_PRODUCTO=$id_pro;
            $convenio->ID_CONVENIO=$request->Input('id_convenio');
            $convenio->UNIDAD=$request->Input('unidad');
            $convenio->CANTIDAD=$request->Input('cantidad');
             $convenio->save();
        }
      
    return Redirect::back();   
    }

public function create3($ID_CONVENIO){
    $inventario= Inventario::all();
        $personal=Personal::all();
        $producto = Producto::findOrFail($ID_CONVENIO);

        $producto = \DB::table('detalle_convenio')
        ->select('*')
        ->join('producto','producto.ID_PRODUCTO','=','detalle_convenio.ID_PRODUCTO')
        ->where('producto.ID_PRODUCTO','=', $ID_CONVENIO)
        ->get()->first();

        $clientes = Clientes::all();
        $proveedor=Proveedor::all();
        $cargo = \DB::table('cargo')
        ->select('*')
        ->get();
        return view('convenio.cotizarconvenio2')->with('clientes',$clientes)->with('producto',$producto)->with(compact('personal'))->with('proveedor',$proveedor)->with('inventario',$inventario)->with('cargo',$cargo);
}

    public function store5(Request $request)
    {
        //dd($request);
        $idproducto=$request->Input('idproducto');
        $ID_COTI = \DB::table('detalle_convenio')
        ->select('ID_CONVENIO')
        ->where('ID_PRODUCTO','=', $idproducto)
        ->pluck('ID_CONVENIO')->first();
        
  
        $nombreusuario= auth()->user()->name;
        $mano =$request->valorhhma;
            $countas = count($mano);
            
             
       
       
       
        $mat =$request->preciounitariom;
        $count = count($mat);
       
            for ($i=0; $i <$count ; $i++) {
              
                
                $material= new Material; 
                $material->USER_C=$nombreusuario;
                $material->ID_PRODUCTO=$idproducto;
                $material->DESCRIPCION=$request->descripcion[$i];
                $material->CANTIDAD=$request->cantidadm[$i];
                $material->PRECIO_UNITARIO=$request->preciounitariom[$i];
                $material->TOTAL=$request->cantidadm[$i]*$request->preciounitariom[$i];
                $material->ESTADO="ESPERA-OC";
                if($material->save()){
                $oc = new OC_detalle;
                $proveedor=$request->proveedor[$i];
                $oc->ID_MATERIAL=$material->ID_MATERIAL;
                $oc->RUT=$proveedor;
                $oc->CANTIDAD=$request->cantidadm[$i];
                $oc->PRECIO_UNITARIO=$request->preciounitariom[$i];
                $oc->TOTAL=$request->cantidadm[$i]*$request->preciounitariom[$i];
                $oc->save();
            
            }
        }
                
            
            $mano =$request->valorhhma;
            $countas = count($mano);
            for ($m=0; $m <$countas ; $m++) {
                $manodeobra = new Mano_Obra;
                $manodeobra->ID_PRODUCTO=$idproducto;
                $manodeobra->RUTP=$request->persona[$m];
                $manodeobra->CANTIDAD_HORAS=$request->cantidadhorasma[$m];
                $manodeobra->H_H =$request->valorhhma[$m];
                $manodeobra->TOTAL_MANO_OBRA=$request->cantidadhorasma[$m]*$request->valorhhma[$m];
                $manodeobra->USER_C=$nombreusuario;
                $manodeobra->save();
            }
            $eq =$request->preciounitario;
            $counteq = count($eq);
            for ($e=0; $e <$counteq ; $e++) {
                $equiposyherramientas = new Equipos_y_o_herramientas;
                $equiposyherramientas->ID_INVENTARIO=$request->equipo[$e];
                $equiposyherramientas->ID_PRODUCTO=$idproducto;
                $equiposyherramientas->UNIDAD_E=$request->unidadeq[$e];
                $equiposyherramientas->CANTIDAD_DIAS_E=$request->cantidad[$e];
                $equiposyherramientas->PRECIO_UNITARIO=$request->preciounitario[$e];
                $equiposyherramientas->VALOR_TOTAL_E=$request->cantidad[$e]* $request->preciounitario[$e];
                $equiposyherramientas->USER_C=$nombreusuario;
                $equiposyherramientas->save();
            }
               
            $eqa =$request->preciounitarioa;
            $counteqa= count($eqa);
            for ($iqa=0; $iqa <$counteqa ; $iqa++) {
                $equiposyherramientasA = new Equipo_y_o_herramienta_arrendados;
                $equiposyherramientasA->ID_PRODUCTO=$idproducto;
                $equiposyherramientasA->NOMBRE=$request->nombre[$iqa];
                $equiposyherramientasA->MARCA=$request->marca[$iqa];
                $equiposyherramientasA->VALOR=$request->preciounitarioa[$iqa];
                $equiposyherramientasA->UNIDAD=$request->unidad[$iqa];
                $equiposyherramientasA->CANTIDAD=$request->cantidada[$iqa];
                $equiposyherramientasA->VALOR_TOTAL=$request->valortotala[$iqa];
                $equiposyherramientasA->USER_C=$nombreusuario;
                $equiposyherramientasA->save();
            }
                
                
            
           
           $materialestotal = \DB::table('material')
           ->select(\DB::raw('SUM(TOTAL)AS TOTAL'))
           ->where('ID_PRODUCTO','=', $idproducto)
            ->pluck('TOTAL')->first();
            
            $manoobratotal = \DB::table('mano_de_obra')
            ->select(\DB::raw('SUM(TOTAL_MANO_OBRA)AS TOTAL'))
            ->where('ID_PRODUCTO','=', $idproducto)
            ->pluck('TOTAL')->first();
   
            $equipototal = \DB::table('equipos_y_o_herramientas')
            ->select(\DB::raw('SUM(VALOR_TOTAL_E)AS TOTAL'))
            ->where('ID_PRODUCTO','=', $idproducto)
            ->pluck('TOTAL')->first();
   
            $equipoatotal = \DB::table('equipo_y_o_herramienta_arrendados')
            ->select(\DB::raw('SUM(VALOR_TOTAL)AS TOTAL'))
            ->where('ID_PRODUCTO','=', $idproducto)
            ->pluck('TOTAL')->first();
   
            $total = $materialestotal + $manoobratotal + $equipototal + $equipoatotal;
            
            $total15 = $total *15/100;
            $totalsuma15 = $total15 + $total;
            $total30 = $totalsuma15 *30/100;
          
            $totalfinal = $total30 + $totalsuma15;
            
            
                 \DB::table('producto')->where('ID_PRODUCTO',$idproducto)->update(array(
               'GASTOS_GENERALES'=>$total15,));
               \DB::table('producto')->where('ID_PRODUCTO',$idproducto)->update(array(
               'UTILIDADES'=>$total30,));
               \DB::table('producto')->where('ID_PRODUCTO',$idproducto)->update(array(
                   'TOTAL'=>$totalfinal,));
          
                \DB::table('producto')->where('ID_PRODUCTO',$idproducto)->update(array(
                    'ESTADO'=>"COTIZADO",));
                    $cant = \DB::table('detalle_convenio')
                    ->select('CANTIDAD')
                    ->where('ID_PRODUCTO','=', $idproducto)
                    ->pluck('CANTIDAD')->first();
                    $totalpr = \DB::table('producto')
                    ->select(\DB::raw('TOTAL'))
                    ->where('ID_PRODUCTO','=', $idproducto)
                    ->pluck('TOTAL')->first();
        
                    $total = $cant * $totalpr;
                   
                  
                      \DB::table('detalle_convenio')->where('ID_PRODUCTO',$idproducto)->update(array(
                       'TOTAL'=>$total, 'VALOR_UNITARIO' => $totalfinal,
               ));
               
               
               $sumas = \DB::table('detalle_convenio')
                    ->select(\DB::raw('SUM(TOTAL) TOTALL'))
                    ->where('ID_CONVENIO','=', $ID_COTI)
                    ->pluck('TOTALL')->first();
      
                    \DB::table('convenios')->where('ID_CONVENIO',$ID_COTI)->update(array(
                        'NETO'=>$sumas,
                     ));
                     $OBTIVA = \DB::table('iva')
                     ->select('IVA')
                     ->where('ESTADO','=', "Activo")
                     ->pluck('IVA')->first();
             
                     $obtneto = \DB::table('convenios')
                     ->select('NETO')
                     ->where('ID_CONVENIO','=', $ID_COTI)
                     ->pluck('NETO')->first();
                     
             
             $iva= ($obtneto*$OBTIVA)/100;
             $totalmasiva = $iva + $obtneto;
                     
             \DB::table('convenios')->where('ID_CONVENIO',$ID_COTI)->update(array(
                'TOTAL'=>$totalmasiva,
             ));
               
                Session::flash('message','Guardado Correctamente');
                Session::flash('class','success');
               
       
        return redirect()->route('convenio.index');
    }


    public function index2($ID_CONVENIO = null)
    {
        //dd($ID_CONVENIO);
try{
        $producto = \DB::table('detalle_convenio')
        ->select('*')
        ->join('convenios','detalle_convenio.ID_CONVENIO', '=','convenios.ID_CONVENIO')
        ->join('producto','detalle_convenio.ID_PRODUCTO', '=','producto.ID_PRODUCTO')
        ->where('convenios.ID_CONVENIO', '=',$ID_CONVENIO )
        ->get();

        
        return view('producto.index2')->with('producto',$producto)->with('ID_CONVENIO',$ID_CONVENIO);
}catch (\Exception $e) {
    return $e->getMessage();
}
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($ID_PRODUCTO)
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
    public function findPrice2(Request $request){
        
        $data=Personal::select(\DB::raw('ROUND((SUELDO_BASE/30)/8) SUELDO_BASE'))->where('RUTP',$request->id)->first(); 
        return response()->json($data);
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
    public function store4(Request $request)
    {
        $idproducto=$request->Input('idproducto');
        $ID_COTI = \DB::table('detalle_cotizacion')
        ->select('ID_COTIZACION')
        ->where('ID_PRODUCTO','=', $idproducto)
        ->pluck('ID_COTIZACION')->first();

        $iva = \DB::table('iva')
        ->select('ID_IVA')
        ->where('ESTADO','=','Activo')
        ->pluck('ID_IVA')->first();

        

  

 
        $VACIO= NULL;

         
        $nombreusuario= auth()->user()->name;
        $mano =$request->valorhhma;
            $countas = count($mano);
            
             
       
            $mat =$request->preciounitariom;
            $count = count($mat);
       
 
            for ($i=0; $i <$count ; $i++) {
               
                $material= new Material; 
                $material->USER_C=$nombreusuario;
                $material->ID_PRODUCTO=$idproducto;
                $material->DESCRIPCION=$request->descripcion[$i];
                $material->CANTIDAD=$request->cantidadm[$i];
                $material->PRECIO_UNITARIO=$request->preciounitariom[$i];
                $material->TOTAL=$request->cantidadm[$i]*$request->preciounitariom[$i];
                $material->ESTADO="ESPERA-OC";
                $material->save();

                $materialid = $material->ID_MATERIAL;
              

                $oc = new OC_detalle;
                $proveedor=$request->proveedor[$i];
                $oc->RUT=$proveedor;
                $oc->ID_MATERIAL=$materialid;
                $oc->CANTIDAD=$request->cantidadm[$i];
                $oc->PRECIO_UNITARIO=$request->preciounitariom[$i];
                $oc->TOTAL=$request->cantidadm[$i]*$request->preciounitariom[$i];
                
                $oc->save();
        }      
                
              
        
                
            
            $mano =$request->valorhhma;
            $countas = count($mano);
            for ($m=0; $m <$countas ; $m++) {
                $manodeobra = new Mano_Obra;
                $manodeobra->ID_PRODUCTO=$idproducto;
                $manodeobra->RUTP=$request->persona[$m];
                $manodeobra->CANTIDAD_HORAS=$request->cantidadhorasma[$m];
                $manodeobra->H_H =$request->valorhhma[$m];
                $manodeobra->TOTAL_MANO_OBRA=$request->cantidadhorasma[$m]*$request->valorhhma[$m];
                $manodeobra->USER_C=$nombreusuario;
                $manodeobra->save();
            }
            $eq =$request->preciounitario;
            $counteq = count($eq);
            for ($e=0; $e <$counteq ; $e++) {
                $equiposyherramientas = new Equipos_y_o_herramientas;
                $equiposyherramientas->ID_INVENTARIO=$request->equipo[$e];
                $equiposyherramientas->ID_PRODUCTO=$idproducto;
                $equiposyherramientas->UNIDAD_E=$request->unidadeq[$e];
                $equiposyherramientas->CANTIDAD_DIAS_E=$request->cantidad[$e];
                $equiposyherramientas->PRECIO_UNITARIO=$request->preciounitario[$e];
                $equiposyherramientas->VALOR_TOTAL_E=$request->cantidad[$e]* $request->preciounitario[$e];
                $equiposyherramientas->USER_C=$nombreusuario;
                $equiposyherramientas->save();
            }
               
            $eqa =$request->preciounitarioa;
            $counteqa= count($eqa);
            for ($iqa=0; $iqa <$counteqa ; $iqa++) {
                $equiposyherramientasA = new Equipo_y_o_herramienta_arrendados;
                $equiposyherramientasA->ID_PRODUCTO=$idproducto;
                $equiposyherramientasA->NOMBRE=$request->nombre[$iqa];
                $equiposyherramientasA->MARCA=$request->marca[$iqa];
                $equiposyherramientasA->VALOR=$request->preciounitarioa[$iqa];
                $equiposyherramientasA->UNIDAD=$request->unidad[$iqa];
                $equiposyherramientasA->CANTIDAD=$request->cantidada[$iqa];
                $equiposyherramientasA->VALOR_TOTAL=$request->valortotala[$iqa];
                $equiposyherramientasA->USER_C=$nombreusuario;
                $equiposyherramientasA->save();
            }
                
                
            
           
           $materialestotal = \DB::table('material')
           ->select(\DB::raw('SUM(TOTAL)AS TOTAL'))
           ->where('ID_PRODUCTO','=', $idproducto)
            ->pluck('TOTAL')->first();
            
            $manoobratotal = \DB::table('mano_de_obra')
            ->select(\DB::raw('SUM(TOTAL_MANO_OBRA)AS TOTAL'))
            ->where('ID_PRODUCTO','=', $idproducto)
            ->pluck('TOTAL')->first();
   
            $equipototal = \DB::table('equipos_y_o_herramientas')
            ->select(\DB::raw('SUM(VALOR_TOTAL_E)AS TOTAL'))
            ->where('ID_PRODUCTO','=', $idproducto)
            ->pluck('TOTAL')->first();
   
            $equipoatotal = \DB::table('equipo_y_o_herramienta_arrendados')
            ->select(\DB::raw('SUM(VALOR_TOTAL)AS TOTAL'))
            ->where('ID_PRODUCTO','=', $idproducto)
            ->pluck('TOTAL')->first();
   
            $total = $materialestotal + $manoobratotal + $equipototal + $equipoatotal;
            $total15 = $total *15/100;
            $totalsuma15 = $total15 + $total;
            $total30 = $totalsuma15 *30/100;
            $totalfinal = $total30 + $totalsuma15;
            
                 \DB::table('producto')->where('ID_PRODUCTO',$idproducto)->update(array(
               'GASTOS_GENERALES'=>$total15,));
               \DB::table('producto')->where('ID_PRODUCTO',$idproducto)->update(array(
               'UTILIDADES'=>$total30,));
               \DB::table('producto')->where('ID_PRODUCTO',$idproducto)->update(array(
                   'TOTAL'=>$totalfinal,));
          
                \DB::table('producto')->where('ID_PRODUCTO',$idproducto)->update(array(
                    'ESTADO'=>"COTIZADO",));

                    $cant = \DB::table('detalle_cotizacion')
                    ->select('CANTIDAD')
                    ->where('ID_PRODUCTO','=', $idproducto)
                    ->pluck('CANTIDAD')->first();
                    $totalpr = \DB::table('producto')
                    ->select(\DB::raw('TOTAL'))
                    ->where('ID_PRODUCTO','=', $idproducto)
                    ->pluck('TOTAL')->first();
        
                    $total = $cant * $totalpr;
                   
                  
                      \DB::table('detalle_cotizacion')->where('ID_PRODUCTO',$idproducto)->update(array(
                       'TOTAL'=>$total,
                    ));

                    $sumas = \DB::table('detalle_cotizacion')
                    ->select(\DB::raw('SUM(TOTAL) TOTALL'))
                    ->where('ID_COTIZACION','=', $ID_COTI)
                    ->pluck('TOTALL')->first();

      

                    \DB::table('cotizacion')->where('ID_COTIZACION',$ID_COTI)->update(array(
                        'VALOR_NETO'=>$sumas,
                     ));

                     $OBTIVA = \DB::table('cotizacion')
                     ->select('iva.IVA as ivita')
                     ->join('iva','iva.ID_IVA','=','cotizacion.ID_IVA')
                     ->where('cotizacion.ID_COTIZACION','=', $ID_COTI)
                     ->pluck('ivita')->first();
             
                     $obtneto = \DB::table('cotizacion')
                     ->select('VALOR_NETO')
                     ->where('ID_COTIZACION','=', $ID_COTI)
                     ->pluck('VALOR_NETO')->first();
                     
             
             $iva= ($obtneto*$OBTIVA)/100;
             $totalmasiva = $iva + $obtneto;
                     
             \DB::table('cotizacion')->where('ID_COTIZACION',$ID_COTI)->update(array(
                'VALOR_TOTAL'=>$totalmasiva,
             ));

             
                  
                Session::flash('message','Guardado Correctamente');
                Session::flash('class','success');
               
       
        return redirect()->route('cotizacion.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function store_pro_coti(Request $request){

        $product = new Producto;
        $name = null;
        if($request->hasFile('plano')){
        $file = $request->file('plano');
        $name= time().$file->getClientOriginalName();
        $file->move(public_path().'/planos/',$name);
        }
        
        $product->CODIGO_SAP = $request->Input('codsap');
        $product->PLANO_PRODUCTO = $name;
        $product->DESCRIPCION = $request->Input('descripcion');
        $product->TIPO_PRODUCTO = $request->Input('tipo');
        $product->FECHA_DE_ENTREGA_PRODUCTO = $request->Input('fecha_entrega');
        $product->ESTADO = "Falta Cotizacion";
        
        if($product->save()){
            $id_pro = $product->ID_PRODUCTO;
            $cotizacion = new Detalle_C;
            $cotizacion->ID_PRODUCTO=$id_pro;
            $cotizacion->ID_COTIZACION=$request->Input('ID_COTI');
            $cotizacion->UNIDAD=$request->Input('unidad');
            $cotizacion->CANTIDAD=$request->Input('cantidad');
            $cotizacion->save();
        }

    return Redirect::back();   
    }

    public function orden_compra_m($RUT = NULL, $ID_PRODUCTO = NULL){
        $material = \DB::table('oc_detalle')
        ->select('material.DESCRIPCION','material.ESTADO','material.CANTIDAD','material.PRECIO_UNITARIO','material.TOTAL')
        ->join('material','oc_detalle.ID_MATERIAL','=','material.ID_MATERIAL')
        ->join('proveedor','oc_detalle.RUT','=','proveedor.RUT')
        ->where('material.ID_PRODUCTO','=', $ID_PRODUCTO)
        ->where('proveedor.RUT','=',$RUT)
        ->get();
        $materiall = \DB::table('oc_detalle')
        ->select('material.ESTADO as ESTADO')
        ->join('material','oc_detalle.ID_MATERIAL','=','material.ID_MATERIAL')
        ->join('proveedor','oc_detalle.RUT','=','proveedor.RUT')
        ->where('material.ID_PRODUCTO','=', $ID_PRODUCTO)
        ->where('proveedor.RUT','=',$RUT)
        ->pluck('ESTADO')->first();
    
      
        
        return view('producto.orden_compra_m')->with('materiall',$materiall)->with('material',$material)->with('ID_PRODUCTO',$ID_PRODUCTO)->with('RUT',$RUT);
    }

    public function show2($ID_PRODUCTO = null)
    {
       // $producto =  Producto::where('ID_PRODUCTO', $ID_PRODUCTO)->first();
   
        $producto = \DB::table('detalle_convenio')
        ->select('*')
        ->join('producto','detalle_convenio.ID_PRODUCTO','=','producto.ID_PRODUCTO')
        ->where('producto.ID_PRODUCTO','=', $ID_PRODUCTO)
         ->get()->first();


       //  OC_detalle;

         $material = \DB::table('proveedor')
         ->select('proveedor.RUT','proveedor.NOMBRE','proveedor.TELEFONO')
         ->join('oc_detalle','proveedor.RUT','=','oc_detalle.RUT')
         ->join('material','material.ID_MATERIAL','=','oc_detalle.ID_MATERIAL')
         ->join('producto','material.ID_PRODUCTO','=','producto.ID_PRODUCTO')
         ->where('producto.ID_PRODUCTO','=', $ID_PRODUCTO)
         ->groupBy('proveedor.RUT','proveedor.NOMBRE','proveedor.TELEFONO')
          ->get();

          $mano_obra = \DB::table('mano_de_obra')
          ->select('*')
          ->where('ID_PRODUCTO','=', $ID_PRODUCTO)
           ->get();
          
           
           $equipo = \DB::table('equipos_y_o_herramientas')
           ->select('*')
           ->join('inventario','equipos_y_o_herramientas.ID_INVENTARIO','=','inventario.ID_INVENTARIO')
           ->where('ID_PRODUCTO','=', $ID_PRODUCTO)
            ->get();

            $equipoa = \DB::table('equipo_y_o_herramienta_arrendados')
            ->select('*')
 
            ->where('ID_PRODUCTO','=', $ID_PRODUCTO)
             ->get();


        $materialestotal = \DB::table('material')
        ->select(\DB::raw('SUM(TOTAL)AS TOTAL'))
        ->where('ID_PRODUCTO','=', $ID_PRODUCTO)
         ->pluck('TOTAL')->first();
         
         $manoobratotal = \DB::table('mano_de_obra')
         ->select(\DB::raw('SUM(TOTAL_MANO_OBRA)AS TOTAL'))
         ->where('ID_PRODUCTO','=', $ID_PRODUCTO)
         ->pluck('TOTAL')->first();

         $equipototal = \DB::table('equipos_y_o_herramientas')
         ->select(\DB::raw('SUM(VALOR_TOTAL_E)AS TOTAL'))
         ->where('ID_PRODUCTO','=', $ID_PRODUCTO)
         ->pluck('TOTAL')->first();

         $equipoatotal = \DB::table('equipo_y_o_herramienta_arrendados')
         ->select(\DB::raw('SUM(VALOR_TOTAL)AS TOTAL'))
         ->where('ID_PRODUCTO','=', $ID_PRODUCTO)
         ->pluck('TOTAL')->first();

         $sumas = $materialestotal+ $manoobratotal+ $equipototal+$equipoatotal ;

         return view('producto.show2')->with('producto',$producto)->with('mano_obra',$mano_obra)->with('material',$material)->with('equipo',$equipo)->with('equipoa',$equipoa);

        /*return view('producto.show', [
            'producto' => $producto,'sumas'=>$sumas, 'material'=>$material, 'equipo'=>$equipo, 'equipoa'=>$equipoa,
        ])->with('mano_obra',$mano_obra);*/
    }


    public function show($ID_PRODUCTO = null)
    {
       // $producto =  Producto::where('ID_PRODUCTO', $ID_PRODUCTO)->first();

        $producto = \DB::table('detalle_cotizacion')
        ->select('*')
        ->join('producto','detalle_cotizacion.ID_PRODUCTO','=','producto.ID_PRODUCTO')
        ->where('producto.ID_PRODUCTO','=', $ID_PRODUCTO)
         ->get()->first();


       //  OC_detalle;

         $material = \DB::table('proveedor')
         ->select('proveedor.RUT','proveedor.NOMBRE','proveedor.TELEFONO')
         ->join('oc_detalle','proveedor.RUT','=','oc_detalle.RUT')
         ->join('material','material.ID_MATERIAL','=','oc_detalle.ID_MATERIAL')
         ->join('producto','material.ID_PRODUCTO','=','producto.ID_PRODUCTO')
         ->where('producto.ID_PRODUCTO','=', $ID_PRODUCTO)
         ->groupBy('proveedor.RUT','proveedor.NOMBRE','proveedor.TELEFONO')
          ->get();

          $mano_obra = \DB::table('mano_de_obra')
          ->select('*')
          ->where('ID_PRODUCTO','=', $ID_PRODUCTO)
           ->get();
          
           
           $equipo = \DB::table('equipos_y_o_herramientas')
           ->select('*')
           ->join('inventario','equipos_y_o_herramientas.ID_INVENTARIO','=','inventario.ID_INVENTARIO')
           ->where('ID_PRODUCTO','=', $ID_PRODUCTO)
            ->get();

            $equipoa = \DB::table('equipo_y_o_herramienta_arrendados')
            ->select('*')
 
            ->where('ID_PRODUCTO','=', $ID_PRODUCTO)
             ->get();


        $materialestotal = \DB::table('material')
        ->select(\DB::raw('SUM(TOTAL)AS TOTAL'))
        ->where('ID_PRODUCTO','=', $ID_PRODUCTO)
         ->pluck('TOTAL')->first();
         
         $manoobratotal = \DB::table('mano_de_obra')
         ->select(\DB::raw('SUM(TOTAL_MANO_OBRA)AS TOTAL'))
         ->where('ID_PRODUCTO','=', $ID_PRODUCTO)
         ->pluck('TOTAL')->first();

         $equipototal = \DB::table('equipos_y_o_herramientas')
         ->select(\DB::raw('SUM(VALOR_TOTAL_E)AS TOTAL'))
         ->where('ID_PRODUCTO','=', $ID_PRODUCTO)
         ->pluck('TOTAL')->first();

         $equipoatotal = \DB::table('equipo_y_o_herramienta_arrendados')
         ->select(\DB::raw('SUM(VALOR_TOTAL)AS TOTAL'))
         ->where('ID_PRODUCTO','=', $ID_PRODUCTO)
         ->pluck('TOTAL')->first();

         $sumas = $materialestotal+ $manoobratotal+ $equipototal+$equipoatotal ;

         return view('producto.show')->with('producto',$producto)->with('mano_obra',$mano_obra)->with('material',$material)->with('equipo',$equipo)->with('equipoa',$equipoa);

        /*return view('producto.show', [
            'producto' => $producto,'sumas'=>$sumas, 'material'=>$material, 'equipo'=>$equipo, 'equipoa'=>$equipoa,
        ])->with('mano_obra',$mano_obra);*/
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
        return view('producto.edit',compact('producto'));
    }

    public function edit2($ID_PRODUCTO = null)
    {
      
        $producto = Producto::findOrFail($ID_PRODUCTO);
        return view('producto.edit2',compact('producto'));
    }


    public function update2(Request $request, $ID_PRODUCTO)
    {
     
        $nameE = null;
        if($request->hasFile('plano')){
        $file = $request->file('plano');
        $nameE= time().$file->getClientOriginalName();
        $file->move(public_path().'/planos/',$nameE);
        }
       
        $producto =  Producto::find($ID_PRODUCTO);
        $producto->PLANO_PRODUCTO =$nameE;
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
        return view('producto.edit2',compact('producto'));
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
        $producto =  Producto::find($ID_PRODUCTO);
        $producto->DESCRIPCION =$request->Input('descripcion');
        $producto->TIPO_PRODUCTO =$request->Input('tipo');
        $producto->PLANO_PRODUCTO =$nameE;
        $producto->FECHA_DE_ENTREGA_PRODUCTO =$request->Input('fecha_entrega');
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
        return view('producto.edit',compact('producto'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function subir_plano($ID_PRODUCTO){
        $producto = Producto::findOrFail($ID_PRODUCTO);
       // dd($ID_PRODUCTO);
        return view('producto.subir_plano')->with('producto',$producto);
    }

    public function update_p(Request $request, $ID_PRODUCTO){
        $nameE = null;

        if($request->hasFile('plano')){
            $file = $request->file('plano');
            $nameE= time().$file->getClientOriginalName();
            $file->move(public_path().'/planos/',$nameE);
           
        }
        $producto =  Producto::find($ID_PRODUCTO);
        $producto->PLANO_PRODUCTO =$nameE;
        if($producto->save()){
            Session::flash('message','Guardado Correctamente');
            Session::flash('class','success');
        }else{
            Session::flash('message','Ha ocurrido un error');
            Session::flash('class','danger');
        }
        return back()->with('info','Usuario Eliminado');
        
    }
    public function destroy(Request $request, $ID_PRODUCTO)
    {
        
        $id_cotizacion = $request->Input('idcoti');
      
        $producto = Producto::find($ID_PRODUCTO);
        $hola = \DB::table('detalle_cotizacion')
               ->select(\DB::raw('count(cotizacion.ID_COTIZACION) as cotizacion'))
               ->join('producto','detalle_cotizacion.ID_PRODUCTO','=','producto.ID_PRODUCTO')
               ->join('cotizacion','detalle_cotizacion.ID_COTIZACION','=','cotizacion.ID_COTIZACION')
               ->where('cotizacion.ID_COTIZACION','=',$id_cotizacion)
               ->pluck('cotizacion')->first();
       

        if($hola== 1){
            return back()->with('info','Usuario Eliminado');
        }else{
            $producto->delete();
            $sumas = \DB::table('detalle_cotizacion')
            ->select(\DB::raw('SUM(TOTAL) TOTALL'))
            ->where('ID_COTIZACION','=', $id_cotizacion)
            ->pluck('TOTALL')->first();
      
            \DB::table('cotizacion')->where('ID_COTIZACION',$id_cotizacion)->update(array(
                'VALOR_NETO'=>$sumas,
             ));

             $OBTIVA = \DB::table('cotizacion')
             ->select('iva.IVA as ivita')
             ->join('iva','iva.ID_IVA','=','cotizacion.ID_IVA')
             ->where('cotizacion.ID_COTIZACION','=', $id_cotizacion)
             ->pluck('ivita')->first();
     
             $obtneto = \DB::table('cotizacion')
             ->select('VALOR_NETO')
             ->where('ID_COTIZACION','=', $id_cotizacion)
             ->pluck('VALOR_NETO')->first();
             
     
     $iva= ($obtneto*$OBTIVA)/100;
     $totalmasiva = $iva + $obtneto;
    
     \DB::table('cotizacion')->where('ID_COTIZACION',$id_cotizacion)->update(array(
        'VALOR_TOTAL'=>$totalmasiva,
     ));
 
            //UPDATE PARA EL VALOR TOTAL DE LA COTIZACION
        }
        return back()->with('info','Usuario Eliminado');
    }
 
   
   
   
   
    public function destroy_pro(Request $request, $ID_PRODUCTO)
    {
        $ID_CONVENIO=$request->Input('idconvenio');


     
    
        $hola = \DB::table('detalle_convenio')
               ->select(\DB::raw('count(convenios.ID_CONVENIO) as convenio'))
               ->join('producto','detalle_convenio.ID_PRODUCTO','=','producto.ID_PRODUCTO')
               ->join('convenios','detalle_convenio.ID_CONVENIO','=','convenios.ID_CONVENIO')
               ->where('convenios.ID_CONVENIO','=',$ID_CONVENIO)
               ->pluck('convenio')->first();
          
               //\DB::raw('')
        $producto = Producto::find($ID_PRODUCTO);
        if($hola== 1){
         return back()->with('info','Usuario Eliminado');
        }else{
          $producto->delete();
          $dtc = \DB::table('detalle_convenio')
          ->select(\DB::raw('SUM(TOTAL)AS TOTAL'))
             ->where('ID_CONVENIO','=',$ID_CONVENIO)
          ->pluck('TOTAL')->first();
          $iva = \DB::table('iva')
        ->select('IVA')
        ->where('ESTADO', '=','Activo' )
        ->pluck('IVA')->first();
        $valordeliva = ($dtc*$iva)/100;
        $valormasiva= $dtc + $valordeliva; 
              \DB::table('convenios')->where('ID_CONVENIO',$ID_CONVENIO)->update(array(
              'NETO'=>$dtc, 'TOTAL'=>$valormasiva
));
    return back()->with('info','Usuario Eliminado');

}
            
        
    }

    public function orden_trabajo($ID_PRODUCTO){

        return view('producto.orden_trabajo');
    }


}
