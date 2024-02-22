<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        return view('almacen.categoria.create');
    }


    public function store(Request $request)
    {
        // $categoria = new Categoria;
        // $categoria->categoria = $request->get('categoria');
        // $categoria->descripcion = $request->get('descripcion');
        // $categoria->estatus = '1';
        // $categoria->save();

        // return Redirect::to('almacen/categoria');
    }


    public function show($id)
    {
        // return view('almacen.categoria.show', ['categoria'=>Categoria::findOrFail($id)]);
    }


    public function edit($id)
    {
        return "Hola Edit Producto";
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
