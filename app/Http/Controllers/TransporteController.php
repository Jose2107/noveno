<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transporte;
use Barryvdh\DomPDF\Facade as PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\TransportesExport;

class TransporteController extends Controller
{
    public function indextrans()
    {
        $transporte=Transporte::withTrashed()->get();
        return view('transportes.indextrans')->with('transporte',$transporte);
    }

    public function create()
    {

        $consulta=Transporte::withTrashed()->orderby('idtranspor','desc')
                    ->take(1)
                    ->get();
        $total=count($consulta);
        if ($total==0) {
            $Idsig=1;
        }
        else {
            $Idsig=$consulta[0]->idsucur+1;
        }

            // return $Idsig;
        return view('transportes.create')
                ->with('Idsig',$Idsig,  )
                ;
        //
    }

    public function guardartranspor(Request $request)
    {
        $this->validate($request,[
            'nombre' => 'required',
            'app' => 'required',
            'apm' => 'required',
            'calle' => 'required',
            'colonia' => 'required',
            'telefono'=>'required|regex:/^[0-9]{10}$/',
            'imagen'=>'image|mimes:gif,jpeg,png',
            'placas' => 'required',
            'color' => 'required',
            'modelo' => 'required',


             ]);
         //
             $file=$request->file('imagen');
             if ($file<>"") {

             $img=$file->getClientOriginalName();
             $img2=$request->idtrasnpor.$img;
             \Storage::disk('local')->put($img2, \File::get($file));
         }
         else {
             $img2="camion.jpg";
         }

     $transporte = new Transporte();
        $transporte->marca = $request->get('marca');
        $transporte->placas = $request->get('placas');
        $transporte->color = $request->get('color');
        $transporte->modelo = $request->get('modelo');
        $transporte->tpc = $request->get('tpc');
        $transporte->seguro = $request->get('seguro');
        $transporte->tps = $request->get('tps');
        $transporte->alarma = $request->get('alarma');
        $transporte->agencia = $request->get('agencia');
        $transporte->nombre = $request->get('nombre');
        $transporte->app = $request->get('app');
        $transporte->apm=$request->get('apm');
        $transporte->calle=$request->get('calle');
        $transporte->colonia=$request->get('colonia');
        $transporte->telefono=$request->get('telefono');
        $transporte->img = $img2;

        // return $transporte;
        $transporte->save();
        return redirect()->route('indextrans')->with('success', 'ok');

    }
    public function modificartranspor($idtranspor)
    {

        $transporte=Transporte::withTrashed()
        ->where('idtranspor',$idtranspor)
        ->get();
    return view('transportes.editar')
    ->with('transporte',$transporte[0])
    ;
    }

    public function update(Request $request)
    {
      $this->validate($request,[
          'nombre' => 'required',
          'app' => 'required',
          'apm' => 'required',
          'calle' => 'required',
          'colonia' => 'required',
          'telefono'=>'required|regex:/^[0-9]{10}$/',
          'imagen'=>'image|mimes:gif,jpeg,png',
          'placas' => 'required',
          'color' => 'required',
          'modelo' => 'required',
           ]);
       //
       $file=$request->file('imagen');
       if ($file<>"") {

       $img=$file->getClientOriginalName();
       $img2=$request->idtrasnpor.$img;
       \Storage::disk('local')->put($img2, \File::get($file));
   }
   else {
       $img2="camion.jpg";
   }
   $transporte =Transporte::withTrashed()->find($request->idtranspor);
      $transporte->marca = $request->get('marca');
      $transporte->placas = $request->get('placas');
      $transporte->color = $request->get('color');
      $transporte->modelo = $request->get('modelo');
      $transporte->tpc = $request->get('tpc');
      $transporte->seguro = $request->get('seguro');
      $transporte->tps = $request->get('tps');
      $transporte->alarma = $request->get('alarma');
      $transporte->agencia = $request->get('agencia');
      $transporte->nombre = $request->get('nombre');
      $transporte->app = $request->get('app');
      $transporte->apm=$request->get('apm');
      $transporte->calle=$request->get('calle');
      $transporte->colonia=$request->get('colonia');
      $transporte->telefono=$request->get('telefono');
      if ($file<>"") {
          $transporte->img = $img2;
      }
      // return $transporte;
      $transporte->save();
      return redirect()->route('indextrans')->with('success', 'edit');
    }


    public function desactivatranspor($idtranspor){
        $sucursales=Transporte::find($idtranspor);
        $sucursales->delete();
        return redirect()->route('indextrans')->with('success', 'desactivar');

    }
    public function activatranspor($idtranspor){
        $sucursales=Transporte::withTrashed()->where('idtranspor',$idtranspor)->restore();
        return redirect()->route('indextrans')->with('success', 'activar');


    }
    public function borrartranspor($idtranspor){
        $sucursales=Transporte::withTrashed()->find($idtranspor)
        ->forceDelete();
        return redirect()->route('indextrans');

    }

    public function pdftransportes(){
        $transporte=Transporte::all();
		$pdf = PDF::loadView('transportes/vistapdf', compact('transporte'))->save(storage_path('app/public/') . 'reporte_transportes.pdf');
		return $pdf->download('reporte_transportes.pdf');
	}

    public function exceltransportes(){
        return Excel::download(new TransportesExport, 'resporte_transportes.xlsx');
    }

}
