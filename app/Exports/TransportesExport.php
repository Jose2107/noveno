<?php

namespace App\Exports;

use App\Models\Transporte;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class TransportesExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $transporte = Transporte::all();
        return view('transportes/vistaexcel')
        ->with('transporte', $transporte);
    }
}
