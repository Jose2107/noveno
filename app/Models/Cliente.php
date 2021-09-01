<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Softdeletes;


class Cliente extends Model
{
    use HasFactory;
    use Softdeletes;
    protected $primaryKey = 'id';
    protected $fillable = ['id','nombre','app','apm','correo','telefono','calle','colonia','num_e','num_i',
    'cp','genero','municipio']; 
}
