<?php

namespace App\Http\Controllers;
use Session;
use App\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proveedor = Proveedor::orderBy('NOMBRE','DESC')->get();
        return view('proveedor.index')->with('proveedor',$proveedor);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('proveedor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $proveedor = new Proveedor;
        $proveedor->RUT =$request->Input('rut');
        $proveedor->NOMBRE =$request->Input('nombre');
        $proveedor->DIRECCION =$request->Input('direccion');
        $proveedor->CIUDAD =$request->Input('ciudad');
        $proveedor->TELEFONO =$request->Input('telefono');
        $proveedor->CORREO =$request->Input('correo');
        try{
            if($proveedor->save()){
                Session::flash('message','Guardado Correctamente');
                Session::flash('class','success');
            }else{
                Session::flash('message','Ha ocurrido un error');
                Session::flash('class','danger');
            }
            }catch(\Exception $e) {
            Session::flash('message','El RUT ingresado ya se encuentra registrado.');
            Session::flash('class','danger');
            }
            return redirect()->route('proveedor.create');       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function show($RUT = null)
    {
        $proveedor = Proveedor::where('RUT', $RUT)->first();

        return view('proveedor.show', [
            'proveedor' => $proveedor,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function edit($RUT = null)
    {
        $proveedor = Proveedor::findOrFail($RUT);
        return view('proveedor.edit',compact('proveedor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $RUT = null)
    {
        $proveedor =  Proveedor::find($RUT);
        $proveedor->RUT =$request->Input('rut');
        $proveedor->NOMBRE =$request->Input('nombre');
        $proveedor->DIRECCION =$request->Input('direccion');
        $proveedor->CIUDAD =$request->Input('ciudad');
        $proveedor->TELEFONO =$request->Input('telefono');
        $proveedor->CORREO =$request->Input('correo');
        try{
            if($proveedor->save()){
                Session::flash('message','Guardado Correctamente');
                Session::flash('class','success');
            }else{
                Session::flash('message','Ha ocurrido un error');
                Session::flash('class','danger');
            }
            }catch(\Exception $e) {
            Session::flash('message','El RUT ingresado ya se encuentra registrado.');
            Session::flash('class','danger');
            }
            return view('proveedor.edit',compact('proveedor'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proveedor $proveedor)
    {
        //
    }
}
