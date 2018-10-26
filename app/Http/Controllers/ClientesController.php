<?php

namespace App\Http\Controllers;
use View;
use App\Clientes;
use Session;
use Illuminate\Http\Request;
class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Clientes::orderBy('RUT_CLIENTE','DESC')->get();
        return view('clientes.index')->with('clientes',$clientes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cliente = new Clientes;
        $cliente->RUT_CLIENTE =$request->Input('rut');
        $cliente->NOMBRE_COMPLETO =$request->Input('nombre');
        $cliente->DIRECCION =$request->Input('direccion');
        $cliente->CIUDAD =$request->Input('ciudad');
        $cliente->COMUNA =$request->Input('comuna');
        $cliente->GIRO =$request->Input('giro');
        $cliente->TELEFONO =$request->Input('telefono');
        $cliente->TIPO =$request->Input('tipo');
        try{
            if($cliente->save()){
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
            return redirect()->route('clientes.create');
            }

    /**
     * Display the specified resource.
     *
     * @param  \App\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function show($RUT_CLIENTE = null)
    {
        #$clientes = Clientes::where('RUT_CLIENTE')->get();
        $clientes = Clientes::where('RUT_CLIENTE', $RUT_CLIENTE)->first();

        return view('clientes.show', [
            'clientes' => $clientes,
        ]);
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function edit($rut = null)
    {
     
        $clientes = Clientes::findOrFail($rut);
        return view('clientes.edit',compact('clientes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $rut)
    {
      
        $clientes =  Clientes::find($rut);

		
        $clientes->RUT_CLIENTE =$request->Input('rut');
        $clientes->NOMBRE_COMPLETO =$request->Input('nombre');
        $clientes->DIRECCION =$request->Input('direccion');
        $clientes->CIUDAD =$request->Input('ciudad');
        $clientes->COMUNA =$request->Input('comuna');
        $clientes->GIRO =$request->Input('giro');
        $clientes->TELEFONO =$request->Input('telefono');
        $clientes->TIPO =$request->Input('tipo');
       
		if ($clientes->save()) {
			Session::flash('message','Actualizado correctamente!');
			Session::flash('class','success');
		} else {
			Session::flash('message','Ha ocurrido un error!');
			Session::flash('class','danger');
		}

        return view('clientes.edit',compact('clientes'));
        
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clientes $clientes)
    {
        //
    }
}
