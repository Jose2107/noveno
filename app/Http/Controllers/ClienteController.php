<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use Barryvdh\DomPDF\Facade as PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ClientesExport;


class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes=Cliente::withTrashed()->get();
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
        $clientes = new Cliente();
        
        $clientes->nombre = $request->get('nombre');
        $clientes->app = $request->get('app');
        $clientes->apm = $request->get('apm');
        $clientes->correo = $request->get('correo');
        $clientes->telefono = $request->get('telefono');
        $clientes->calle = $request->get('calle');
        $clientes->colonia = $request->get('colonia');
        $clientes->num_e = $request->get('num_e');
        $clientes->num_i = $request->get('num_i');
        $clientes->cp = $request->get('cp');
        $clientes->genero = $request->get('genero');
        $clientes->municipio = $request->get('municipio');
        
        $clientes->save(); 
        return redirect('/clientes')->with('success', 'ok');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cliente = Cliente::find($id);
        return view('clientes.edit')->with('cliente',$cliente);
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
        $cliente = Cliente::find($id);
        
        $cliente->nombre = $request->get('nombre');
        $cliente->app = $request->get('app');
        $cliente->apm = $request->get('apm');
        $cliente->correo = $request->get('correo');
        $cliente->telefono = $request->get('telefono');
        $cliente->calle = $request->get('calle');
        $cliente->colonia = $request->get('colonia');
        $cliente->num_e = $request->get('num_e');
        $cliente->num_i = $request->get('num_i');
        $cliente->cp = $request->get('cp');
        $cliente->genero = $request->get('genero');
        $cliente->municipio = $request->get('municipio');
        
        $cliente->save(); 
        return redirect('/clientes')->with('success', 'edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function desactivarcliente($id)
    {
        $cliente=Cliente::Find($id);
        $cliente->delete();
        return redirect('/clientes')->with('success', 'desactivar');
    }
    public function activarcliente($id)
    {
        $cliente=Cliente::withTrashed()->where('id',$id)->restore();
        return redirect('/clientes')->with('success', 'activar');
    }

    public function destroy($id)
    {
        $cliente=Cliente::withTrashed()->find($id);
            $cliente->forceDelete();
            return redirect('/clientes');
    }

    public function pdfclientes(){
        $clientes=Cliente::all();				
		$pdf = PDF::loadView('clientes/vistapdf', compact('clientes'))->save(storage_path('app/public/') . 'reporte_clientes.pdf');
		return $pdf->download('reporte_clientes.pdf');
	}

    public function excelclientes(){
        return Excel::download(new ClientesExport, 'resporte_clientes.xlsx');
    }

}
