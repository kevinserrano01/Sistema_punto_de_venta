<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Http\Requests\ClienteFormRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class ClienteController extends Controller
{
    
   public function index(Request $request)
   {
       // Clientes de Alta
       if ($request) {
           $query = trim($request->get('searchText')); // Busqueda reciente
           // $clientes = Cliente::all(); // Traer todas los Clientes
           $clientes = DB::table('persona') // Clientes solo dadas de Alta
           ->where('nombre', 'LIKE', '%'.$query.'%')
           ->where('tipo_persona', '=', 'Cliente')
           ->orderBy('id_persona', 'desc')
           ->paginate(7);

           return view('ventas.clientes.index', ['clientes'=>$clientes, 'searchText'=>$query]);
       }
   }

   /**
    * Show the form for creating a new resource.
    */
   public function create()
   {
       return view('ventas.clientes.create');
   }

   /**
    * Store a newly created resource in storage.
    */
   public function store(ClienteFormRequest $request)
   {
       $cliente = new Cliente();
       $cliente->tipo_persona = $request->get('tipo_persona');
       $cliente->nombre = $request->get('nombre');
       $cliente->tipo_documento = $request->get('tipo_documento');
       $cliente->nro_documento = $request->get('nro_documento');
       $cliente->direccion = $request->get('direccion');
       $cliente->telefono = $request->get('telefono');
       $cliente->email = $request->get('email');
       $cliente->save();

       return Redirect::to('ventas/clientes');
   }

   /**
    * Display the specified resource.
    */
   public function show($id)
   {
       return view('ventas.clientes.show', ['cliente'=>Cliente::findOrFail($id)]);
   }

   /**
    * Show the form for editing the specified resource.
    */
   public function edit($id)
   {
       return view('ventas.clientes.edit', ['cliente'=>Cliente::findOrFail($id)]);
   }

   /**
    * Update the specified resource in storage.
    */
   public function update(ClienteFormRequest $request, $id)
   {
       $cliente = Cliente::findOrFail($id);
       $cliente->tipo_persona = $request->get('tipo_persona');
       $cliente->nombre = $request->get('nombre');
       $cliente->tipo_documento = $request->get('tipo_documento');
       $cliente->nro_documento = $request->get('nro_documento');
       $cliente->direccion = $request->get('direccion');
       $cliente->telefono = $request->get('telefono');
       $cliente->email = $request->get('email');
       $cliente->update();

       return Redirect::to('ventas/clientes');
   }

   /**
    * Remove the specified resource from storage.
    */
   public function destroy($id)
   {
       $cliente = Cliente::findOrFail($id);
       $cliente->estatus = '0';
       $cliente->update();

       // return Redirect::to('almacen/categoria');
       return redirect()->route('clientes.index')->with('success', __('Client deleted successfully!'));
   }
}
