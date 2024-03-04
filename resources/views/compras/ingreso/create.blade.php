@extends('layouts.admin')
@section('contenido')
<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ __('New Entry') }}</h3>
        </div>

        <form action="{{ route('ingreso.store') }}" method="post" class="form">
        @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="supplier">{{ __('Supplier') }}</label>
                            <select name="id_proveedor" class="form-control" id="id_proveedor">
                                @foreach ($personas as $persona)
                                    <option value="{{ $persona->id_persona }}">{{ $persona->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="tipo_documento">{{ __('Document type') }}</label>
                            <select name="tipo_documento" class="form-control" id="tipo_documento">
                                <option value="RFC">LICENCIA</option>
                                <option value="DNI">DNI</option>
                                <option value="PASAPORTE">PASAPORTE</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="nro_documento">{{ __('Document number') }}</label>
                            <input type="text" class="form-control" name="nro_documento" id="nro_documento" placeholder="{{ __('Add document number') }}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="supplier">{{ __('Products') }}</label>
                            <select name="id_producto" class="form-control selectpicker" id="id_producto" data-live-search="true">
                                @foreach ($productos as $producto)
                                    <option value="{{ $producto->id_productos }}">{{ $producto->Articulo }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label for="cantidad">{{ __('Quantity') }}</label>
                            <input type="number" class="form-control" name="pcantidad" id="pcantidad" placeholder="{{ __('Add quantity') }}">
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label for="pcompra">{{ __('Purchase Price') }}</label>
                            <input type="number" class="form-control" name="pprecio_compra" id="pprecio_compra" step="0.01" min="0" placeholder="P. Compra">
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label for="pventa">{{ __('Price Sale') }}</label>
                            <input type="number" class="form-control" name="pprecio_venta" id="pprecio_venta" step="0.01" min="0" placeholder="P. Venta">
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label for="supplier">{{ __('Action') }}</label>
                            <button type="button" id="btn-add" class="btn btn-success"></button>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="card-body">
                        </div>
                        <!-- table hover -->
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>Opciones</th>
                                        <th>Producto</th>
                                        <th>Cantidad</th>
                                        <th>Precio Compra</th>
                                        <th>Precio Venta</th>
                                        <th>Subtotal</th>
                                        <th>Estado</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <th>TOTAL</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th><h4 id="total">$ 0.00 </h4></th>
                                </tfoot>
                                <tbody>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                    {{-- <input type="hidden" name="_tocken" value="{{ csrf_tocken() }}"> --}}
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success me-1 mb-1">{{ __('Save') }}</button>
                        <button type="reset" class="btn btn-danger me-1 mb-1">{{ __('Cancel') }}</button>
                    </div>
                </div>

                
            </div>
        </form>
    </div>
</div>
@stop