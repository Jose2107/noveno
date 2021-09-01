<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Softdeletes;

class Transporte extends Model
{
    use HasFactory;
    use Softdeletes;
    protected $primaryKey = 'idtranspor';
    protected $fillable = ['imagen','modelo','placas','marca',
    'seguro','tpc','color','alarma','tps','agencia','nombre','app','apm','calle','colonia','telefono'];
}
