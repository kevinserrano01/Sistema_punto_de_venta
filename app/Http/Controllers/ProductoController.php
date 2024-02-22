<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Productos de Alta
        $texto = trim($request->get('texto')); // Busqueda reciente

        $productos = DB::table('producto as a') // Categorias solo dadas de Alta
        ->join('categoria as c', 'a.id_categoria', '=', 'c.id_categoria')
        ->select('a.id_productos', 'a.nombre', 'a.codigo', 'a.stock', 'c.categoria as categoria', 'a.descripcion', 'a.imagen', 'a.estatus')
        ->where('a.nombre', 'LIKE', '%'.$texto.'%')
        ->orwhere('a.codigo', 'LIKE', '%'.$texto.'%')
        ->orderBy('id_productos', 'desc')
        ->paginate(10);

        return view('almacen.producto.index', compact('productos', 'texto'));
 
    }


    public function create()
    {
        // Obtener todas las categorías con estatus igual a 1
        $categorias = Categoria::where('estatus', 1)->get();
        // $categorias = DB::table('categoria')->where('estatus', '=', '1')->get(); // Traer solo Categorias dadas de Alta.
        return view('almacen.producto.create', compact('categorias'));
    }


    public function store(Request $request)
    {
        $producto = new Producto();
        $producto->id_categoria = $request->input('id_categoria');
        $producto->codigo = $request->input('codigo');
        $producto->nombre = $request->input('nombre');
        $producto->stock = $request->input('stock');;
        $producto->descripcion = $request->input('descripcion');;
        $producto->estatus = 'Activo';
        // Script para subir la imagen
        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $nombreImagen = Str::slug($request->nombre).".".$imagen->guessExtension();
            $ruta = public_path('/images/productos/');

            copy($imagen->getRealPath(), $ruta.$nombreImagen);

            $producto->imagen = $nombreImagen;
        }

        $producto->save();

        return redirect()->route('producto.index');
    }


    public function show($id)
    {
        // return view('almacen.categoria.show', ['categoria'=>Categoria::findOrFail($id)]);
    }


    public function edit($id)
    {
        // return view('almacen.categoria.edit', ['categoria'=>Categoria::findOrFail($id)]);
    }


    public function update($id)
    {
        // $categoria = Categoria::findOrFail($id);
        // $categoria->categoria = $request->get('categoria');
        // $categoria->descripcion = $request->get('descripcion');
        // $categoria->update();

        // return Redirect::to('almacen/categoria');
    }


    public function destroy($id)
    {
        // $categoria = Categoria::findOrFail($id);
        // $categoria->estatus = '0';
        // $categoria->update();

        // // return Redirect::to('almacen/categoria');
        // return redirect()->route('categoria.index')->with('success', __('Category deleted successfully!'));
    }
}
