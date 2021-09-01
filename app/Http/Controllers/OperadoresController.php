<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Municipios;
use App\Models\Operadores;
use Barryvdh\DomPDF\Facade as PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\OperadoresExport;


class OperadoresController extends Controller
{
    public function guardaroperador(Request $request) {
        $this->validate($request,[
            'nombre' => 'required|regex:/^[A-Z][A-Z,a-z,á,é,í,ó,ú,ñ,Ñ,Á,É,Í,Ó,Ú,ü, ]+$/',
            'apellidop' => 'required|regex:/^[A-Z][A-Z,a-z,á,é,í,ó,ú,ñ,Ñ,Á,É,Í,Ó,Ú,ü, ]+$/',
            'apellidom' => 'required|regex:/^[A-Z][A-Z,a-z,á,é,í,ó,ú,ñ,Ñ,Á,É,Í,Ó,Ú,ü, ]+$/',
            'email' => 'required|email',
            'telefono' => 'required|regex:/^[0-9]{10}$/',
            'calle' => 'required',
            'colonia' => 'required|regex:/^[A-Z][A-Z,a-z,á,é,í,ó,ú,ñ,Ñ,Á,É,Í,Ó,Ú,ü, ]+$/',
            'noexterior' => 'required',
            'nointerior' => 'required',
            'cp' => 'required|regex:/^[0-9]{5}$/',
            'foto' => 'image|mimes:jpeg,png',
        ]);

        $file = $request->file('foto');
        if($file<>""){
            $foto =$file->getClientOriginalName();
            $foto2 = $request->idoperador . $foto;
            \Storage::disk('local')->put($foto2, \File::get($file));
        }
        else{
            $foto2 ="sinfoto.jpg";
        }
        $operadores = new operadores;
        $operadores->idoperador = $request->idoperador;
        $operadores->nombre =$request->nombre;
        $operadores->apellidop =$request->apellidop;
        $operadores->apellidom =$request->apellidom;
        $operadores->genero =$request->genero;
        $operadores->email=$request->email;
        $operadores->telefono =$request->telefono;
        $operadores->calle=$request->calle;
        $operadores->colonia=$request->colonia;
        $operadores->noexterior=$request->noexterior;
        $operadores->nointerior=$request->nointerior;
        $operadores->cp =$request->cp;
        $operadores->maneja=$request->maneja;
        $operadores->conduce=$request->conduce;
        $operadores->idmunicipio=$request->idmunicipio;
        $operadores->foto =$foto2;
        $operadores->save();
        return redirect()->route('operadores.reporteoperadores')->with('success', 'ok');
    }

    public function altaoperador() {
        $consulta=operadores::withTrashed()->OrderBy('idoperador','DESC')->take(1)->get();
        $cuantos=count($consulta);
        if($cuantos==0){
            $idlsigue = 1;
        }
        else{
            $idlsigue=$consulta[0]->idoperador + 1;
        }
        $municipios =municipios::orderBy('nombre')->get();
        return view('operadores.altaoperador')
            ->with('idlsigue',$idlsigue)
            ->with('municipios',$municipios)
            ->with('success', 'edit');
    }

    public function reporteoperadores(Request $req){
        $criterio_nom = $req['criterio_nom'];

        $consulta=operadores::withTrashed()->select('operadores.idoperador','operadores.nombre','operadores.apellidop','operadores.apellidom',
        'operadores.foto','operadores.telefono','operadores.email','operadores.maneja','operadores.deleted_at')
        ->where('nombre', 'LIKE', "%$criterio_nom%")
        ->orwhere('apellidop', 'LIKE', "%$criterio_nom%")
        ->orderBy('operadores.apellidop')
        ->paginate(10);
        return view('operadores.reporteoperadores')->with('consulta',$consulta);
    }

    public function modificaoperador($idoperador){
        $consulta=operadores::withTrashed()->join('municipios','operadores.idmunicipio','=','municipios.idmunicipio')
        ->select('operadores.idoperador','operadores.nombre','operadores.apellidop','operadores.apellidom',
        'operadores.genero','operadores.email','operadores.telefono','operadores.calle','operadores.colonia',
        'operadores.noexterior','operadores.nointerior','operadores.cp','operadores.idmunicipio',
        'operadores.maneja','operadores.conduce','municipios.nombre as muni','operadores.foto')
        ->where('idoperador',$idoperador)
        ->get();
        $municipios =municipios::orderBy('nombre')->get();
        return view('operadores.modificaoperador')
        ->with('consulta',$consulta[0])
        ->with('municipios',$municipios);
    }

    public function guardarcambiosoperador(Request $request) {
        $this->validate($request,[
            'nombre' => 'required|regex:/^[A-Z][A-Z,a-z,á,é,í,ó,ú,ñ,Ñ,Á,É,Í,Ó,Ú,ü, ]+$/',
            'apellidop' => 'required|regex:/^[A-Z][A-Z,a-z,á,é,í,ó,ú,ñ,Ñ,Á,É,Í,Ó,Ú,ü, ]+$/',
            'apellidom' => 'required|regex:/^[A-Z][A-Z,a-z,á,é,í,ó,ú,ñ,Ñ,Á,É,Í,Ó,Ú,ü, ]+$/',
            'email' => 'required|email',
            'telefono' => 'required|regex:/^[0-9]{10}$/',
            'calle' => 'required',
            'colonia' => 'required|regex:/^[A-Z][A-Z,a-z,á,é,í,ó,ú,ñ,Ñ,Á,É,Í,Ó,Ú,ü, ]+$/',
            'noexterior' => 'required',
            'nointerior' => 'required',
            'cp' => 'required|regex:/^[0-9]{5}$/',
            'foto' => 'image|mimes:jpeg,png',
        ]);

        $file = $request->file('foto');
        if($file<>""){
            $foto =$file->getClientOriginalName();
            $foto2 = $request->idoperador . $foto;
            \Storage::disk('local')->put($foto2, \File::get($file));
        }
        else{
            $foto2 ="sinfoto.jpg";
        }
        $operadores = operadores::withTrashed()->find($request->idoperador);;
        $operadores->idoperador = $request->idoperador;
        $operadores->nombre =$request->nombre;
        $operadores->apellidop =$request->apellidop;
        $operadores->apellidom =$request->apellidom;
        $operadores->genero =$request->genero;
        $operadores->email=$request->email;
        $operadores->telefono =$request->telefono;
        $operadores->calle=$request->calle;
        $operadores->colonia=$request->colonia;
        $operadores->noexterior=$request->noexterior;
        $operadores->nointerior=$request->nointerior;
        $operadores->cp =$request->cp;
        $operadores->maneja=$request->maneja;
        $operadores->conduce=$request->conduce;
        $operadores->idmunicipio=$request->idmunicipio;
        if($file<>""){
            $operadores->foto =$foto2;
            }
        $operadores->save();
        return redirect()->route('operadores.reporteoperadores')->with('success', 'edit');
    }
    public function desactivaoperador($idoperador){
        $operadores=operadores::find($idoperador);
        $operadores->delete();
        return redirect()->route('operadores.reporteoperadores')->with('success', 'desactivar');
    }
    public function activaroperador($idoperador){
        $operadores=operadores::withTrashed()->where('idoperador',$idoperador)->restore();
        return redirect()->route('operadores.reporteoperadores')->with('success', 'activar');
    }

    public function borraroperador($idoperador){
        $operadores=operadores::withTrashed()->find($idoperador)->forceDelete();
        return redirect()->route('operadores.reporteoperadores');
    }

    public function buscaroperador(){
        $criterio = $req['criterio'];
        $operadores = operadores::withTrashed()->where(function($query) use ($criterio){
                $query->where('nombre', 'LIKE', "%$criterio%")->orwhere('apellidop', 'LIKE', "%$criterio%")
                ->orwhere('apellidom', 'LIKE', "%$criterio%");
            })->paginate(15);

        return view('operadores.reporteoperadores',['operadores'=>$operadores]);
    }

    public function pdfoperadores(){
        $consulta=Operadores::all();
		$pdf = PDF::loadView('Operadores/vistapdf', compact('consulta'))->save(storage_path('app/public/') . 'reporte_operadores.pdf');
		return $pdf->download('reporte_operadores.pdf');
	}


    public function exceloperadores(){
        return Excel::download(new OperadoresExport, 'resporte_operadores.xlsx');
    }

}
