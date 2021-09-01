<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Softdeletes;


class Operadores extends Model
{
    use HasFactory;
    use Softdeletes;
    protected $primaryKey ='idoperador';
    protected $fillable =['idoperador','nombre','apellidop','apellidom','genero','email',
    'telefono','calle','colonia','noexterior','nointerior','cp','maneja','conduce','foto','idmunicipio'];
}