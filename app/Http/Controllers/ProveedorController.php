<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proveedores;
use App\Http\Requests\ProveedorFormRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Clientes de Alta
       if ($request) {
        $query = trim($request->get('searchText')); // Busqueda reciente

        $proveedores = DB::table('persona') // Clientes solo dadas de Alta
        ->where('nombre', 'LIKE', '%'.$query.'%')
        ->where('tipo_persona', '=', 'Proveedor')
        ->where('estatus', '=', '1')
        ->orderBy('id_persona', 'desc')
        ->paginate(7);

        return view('compras.proveedor.index', ['proveedores'=>$proveedores, 'searchText'=>$query]);
    }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('compras.proveedor.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProveedorFormRequest $request)
    {
        $proveedor = new Proveedores();
        $proveedor->tipo_persona = 'Proveedor';
        $proveedor->nombre = $request->input('nombre');
        $proveedor->tipo_documento = $request->input('tipo_documento');
        $proveedor->nro_documento = $request->input('nro_documento');
        $proveedor->direccion = $request->input('direccion');
        $proveedor->telefono = $request->input('telefono');
        $proveedor->email = $request->input('email');
        $proveedor->estatus = '1';
        $proveedor->save();

        return redirect()->route('proveedor.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view('compras.proveedor.show', ['proveedor'=>Proveedores::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('compras.proveedor.edit', ['proveedor'=>Proveedores::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProveedorFormRequest $request, $id)
    {
        $proveedor = Proveedores::findOrFail($id);
        $proveedor->nombre = $request->input('nombre');
        $proveedor->tipo_documento = $request->input('tipo_documento');
        $proveedor->nro_documento = $request->input('nro_documento');
        $proveedor->direccion = $request->input('direccion');
        $proveedor->telefono = $request->input('telefono');
        $proveedor->email = $request->input('email');
        $proveedor->update();

        return redirect()->route('proveedor.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $proveedor = Proveedores::findOrFail($id);
        $proveedor->estatus = '0';
        $proveedor->update();

        return redirect()->route('proveedor.index')->with('success', __('Proveedor deleted successfully!'));
    }
}
