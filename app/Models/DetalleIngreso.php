<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleIngreso extends Model
{
    use HasFactory;

    protected $table = 'detalle_ingreso';
    protected $primaryKey = 'id_detalle_ingreso';
    public $timestamps = false;

    protected $fillable = [
        'id_ingreso',
        'id_producto',
        'cantidad',
        'precio_compra',
        'precip_venta'
    ];

    protected $guarded = [

    ];
}
