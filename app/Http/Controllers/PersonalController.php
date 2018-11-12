<?php

namespace App\Http\Controllers;

use App\Personal;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Cargo;
use App\Clientes;
use App\Carga_Familiar;
use Carbon\Carbon;
use App\Cargo_Personal;

class PersonalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $personal = Personal::all();
        $clientes = Clientes::all();
        return view('personal.index')->with('personal',$personal)->with('clientes',$clientes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cargo = Cargo::pluck('CARGO', 'ID_CARGO');
        return view('personal.create',compact('cargo'));
    }

    public function createc(){
        return view('personal.createc');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store2(Request $request)
    {
        
        //dd($request->all());
        $personal = new Personal;
        $personal->RUTP =$request->Input('rutp');
        $personal->NOMBREP =$request->Input('nombre');
        $personal->APELLIDOP =$request->Input('apellido');
        $personal->CIUDAD =$request->Input('ciudad');
        $personal->DIRECCION =$request->Input('direccion');
        $personal->ESTADO_CIVIL =$request->Input('estado_civil');
        $personal->TITULO =$request->Input('titulos');
        $personal->NOMBRE_CONYUGE =$request->Input('nombre_conyuge');
        $personal->TELEFONO_CONYUGE =$request->Input('telefono_conyuge');
        $personal->APELLIDOP =$request->Input('apellido');
        $personal->TELEFONOP =$request->Input('telefono');
        $personal->CORREOP =$request->Input('correo');
        $personal->FECHANACIMIENTO =$request->Input('fecha_nac');
        $personal->ESTADO ="ACTIVO";
        $personal->LUGAR_TRABAJO =$request->Input('lugar_trabajo');
        $personal->PREVISION =$request->Input('prevision');
        $personal->AFP =$request->Input('afp');
        $personal->SUELDO_BASE =$request->Input('sueldo_base');
        $personal->GRATIFICACION =$request->Input('gratificacion');
        $personal->MOVILIZACION =$request->Input('movilizacion');
        $personal->COLACION =$request->Input('colacion');
        $personal->FECHA_INICIO_CONTRATO =$request->Input('fecha_inicio_c');
        $personal->FECHA_TERMINO_CONTRATO =$request->Input('fecha_termino_c');
        $personal->TALLA_ROPA =$request->Input('talla_ropa');
        $personal->NZAPATO =$request->Input('num_zapato');
 

        try{
        if($personal->save()){
        $id = $personal->RUTP;
        
        $r =$request->rut;
        $count = count($r);
        
        for($i = 0; $i < $count; $i++){
            if($request->nombre_completo[$i] <> "" or $request->rut[$i] <> "" or $request->fecha_nacimiento[$i] <> ""){     
            $carga = new Carga_Familiar;
            $carga->RUTP=$id;
            $carga->RUT=$request->rut[$i];
            $carga->NOMBRE=$request->nombre_completo[$i];
            $carga->FECHA_NACIMIENTO=$request->fecha_nacimiento[$i];
            $carga->save();
            }
        }

        foreach($request->cargo as $id_c)
        {
            $data = array(
                'RUTP'=>$id,
                'ID_CARGO'=>$id_c,
                'FECHA_CARGO'=>Carbon::now());
            
            Cargo_Personal::insert($data);
        }

            Session::flash('message','Guardado Correctamente');
            Session::flash('class','success');
        }else{
            Session::flash('message','Ha ocurrido un error');
            Session::flash('class','danger');
        }}catch(\Exception $e)
        {
            Session::flash('message','Error!! Personal ya registrado o no le agrego cargos! Reintente...');
            Session::flash('class','danger');
        }
 
        return redirect()->route('personal.create');
       // $persona->TIPO = Select::get('tipo');
    
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Personal  $RUTP
     * @return \Illuminate\Http\Response
     */
    public function show($RUTP = null)
    {
        $carga = \DB::table('carga_familiar')
        ->select('*')
        ->join('personal','carga_familiar.RUTP','=','personal.RUTP')
        ->where('personal.RUTP', '=', $RUTP)
        ->get();
        $cargo = \DB::table('cargo_personal')
        ->select('*')
        ->join('personal','cargo_personal.RUTP','=','personal.RUTP')
        ->join('cargo','cargo_personal.ID_CARGO','=','cargo.ID_CARGO')
        ->where('personal.RUTP', '=', $RUTP)
        ->get();
        $personal = Personal::where('RUTP', $RUTP)->first();

        return view('personal.show', [
            'personal' => $personal,
        ])->with('carga',$carga)->with('cargo',$cargo);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function edit($RUTP = null)
    {      
        /*$carga = \DB::table('carga_familiar')
        ->select('*')
        ->join('personal','carga_familiar.RUTP','=','personal.RUTP')
        ->where('personal.RUTP', '=', $RUTP)
        ->get();
        $cargo = \DB::table('cargo_personal')
        ->select('*')
        ->join('personal','cargo_personal.RUTP','=','personal.RUTP')
        ->join('cargo','cargo_personal.ID_CARGO','=','cargo.ID_CARGO')
        ->where('personal.RUTP', '=', $RUTP)
        ->get();*/

        $personal = Personal::findOrFail($RUTP);
        return view('personal.edit',compact('personal'));
    }

    public function carga_familiar($RUTP = null){

        //$carga = Carga_Familiar::get();
        $personal = Personal::findOrFail($RUTP);
        $cargas = \DB::table('carga_familiar')
        ->select('*')
        ->join('personal','carga_familiar.RUTP','=','personal.RUTP')
        ->where('personal.RUTP', '=', $RUTP)
        ->get();
   
        return view('personal.carga_familiar')->with('cargas',$cargas)->with('personal',$personal);
    }


    public function store_carga(Request $request, $RUTP){
     

        $personal =  Personal::find($RUTP); 
        dd($personal);
        $personalinsert = new Personal;
        $personalinsert->RUTP=$RUTP;
        $personalinsert->RUT=$request->Input('rut');
        $personalinsert->NOMBRE=$request->Input('nombre');
        $personalinsert->FECHA_NACIMIENTO=$request->Input('fecha_nacimiento');
        $personalinsert->save();
        
    
  
    return redirect()->route('personal.carga_familiar');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $RUTP)
    {
        
       // dd($request);
        $personal =  Personal::find($RUTP);

		
        $personal->NOMBREP =$request->Input('nombre');
        $personal->APELLIDOP =$request->Input('apellido');
        $personal->CIUDAD =$request->Input('ciudad');
        $personal->DIRECCION =$request->Input('direccion');
        $personal->ESTADO_CIVIL =$request->Input('estado_civil');
        $personal->TITULO =$request->Input('titulos');
        $personal->NOMBRE_CONYUGE =$request->Input('nombre_conyuge');
        $personal->TELEFONO_CONYUGE =$request->Input('telefono_conyuge');
        $personal->APELLIDOP =$request->Input('apellido');
        $personal->TELEFONOP =$request->Input('telefono');
        $personal->CORREOP =$request->Input('correo');
        $personal->FECHANACIMIENTO =$request->Input('fecha_nac');
        $personal->ESTADO ="ACTIVO";
        $personal->LUGAR_TRABAJO =$request->Input('lugar_trabajo');
        $personal->PREVISION =$request->Input('prevision');
        $personal->AFP =$request->Input('afp');
        $personal->SUELDO_BASE =$request->Input('sueldo_base');
        $personal->GRATIFICACION =$request->Input('gratificacion');
        $personal->MOVILIZACION =$request->Input('movilizacion');
        $personal->COLACION =$request->Input('colacion');
        $personal->FECHA_INICIO_CONTRATO =$request->Input('fecha_inicio_c');
        $personal->FECHA_TERMINO_CONTRATO =$request->Input('fecha_termino_c');
        $personal->TALLA_ROPA =$request->Input('talla_ropa');
        $personal->NZAPATO =$request->Input('num_zapato');
       
        
        
            if($personal->save()){
           /* $id = $personal->RUTP;
            
            $r =$request->rut;
            $count = count($r);
            
            for($i = 0; $i < $count; $i++){
                if($request->nombre_completo[$i] <> "" or $request->rut[$i] <> "" or $request->fecha_nacimiento[$i] <> ""){     
                $carga = new Carga_Familiar;
                $carga->RUTP=$id;
                $carga->RUT=$request->rut[$i];
                $carga->NOMBRE=$request->nombre_completo[$i];
                $carga->FECHA_NACIMIENTO=$request->fecha_nacimiento[$i];
                dd($carga);
                $carga->save();
                }
               
            }
            
            foreach($request->cargo as $id_c)
            {
                $data = array(
                    'RUTP'=>$id,
                    'ID_CARGO'=>$id_c,
                    'FECHA_CARGO'=>Carbon::now());
                
                Cargo_Personal::save($data);
            }*/
    
            Session::flash('message','Guardado Correctamente');
            Session::flash('class','success');
            }else {
			Session::flash('message','Ha ocurrido un error!');
			Session::flash('class','danger');
		}

        return view('personal.edit',compact('personal'));
    
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Personal $personal)
    {
        //
    }

    public function storec(Request $request)
    {
        
        #dd($request->all());
        $cargo = new Cargo;
        $cargo->CARGO =$request->Input('nombre');
        $cargo->DESCRIPCION =$request->Input('descripcion');
        
        try{
        if($cargo->save()){
            Session::flash('message','Guardado Correctamente');
            Session::flash('class','success');
            return view('personal.createc');
        }else{
            Session::flash('message','Ha ocurrido un error');
            Session::flash('class','danger');
        }
        }catch(\Exception $e) {
        Session::flash('message','El RUT ingresado ya se encuentra registrado.');
        Session::flash('class','danger');
        }
        
       // $persona->TIPO = Select::get('tipo');
    
    }
}
