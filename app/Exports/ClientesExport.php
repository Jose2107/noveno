<?php

namespace App\Exports;

use App\Models\Cliente;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ClientesExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $clientes = Cliente::all();
        return view('clientes/vistaexcel')
        ->with('clientes', $clientes);
    }
}
