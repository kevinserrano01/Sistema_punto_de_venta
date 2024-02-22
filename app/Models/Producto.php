<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'producto';
    protected $primaryKey = 'id_productos';
    public $timestamps = false;

    protected $fillable = [
        'codigo',
        'nombre',
        'stock',
        'descripcion',
        'imagen',
        'estatus',
        'id_categoria'
    ];
}
