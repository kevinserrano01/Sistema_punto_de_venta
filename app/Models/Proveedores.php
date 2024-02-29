<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedores extends Model
{
    use HasFactory;

    protected $table = 'persona';
    protected $primaryKey = 'id_persona';
    public $timestamps = false; // fechas automatico

    protected $fillable = [
        'tipo_persona',
        'nombre',
        'tipo_documento',
        'nro_documento',
        'direccion',
        'telefono',
        'email'
    ];

    protected $guarded = [

    ];
}
