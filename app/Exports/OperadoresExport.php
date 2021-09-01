<?php

namespace App\Exports;

use App\Models\Operadores;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class OperadoresExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $consulta = Operadores::all();
        return view('operadores/vistaexcel')
        ->with('consulta', $consulta);
    }
}
