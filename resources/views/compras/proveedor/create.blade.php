@extends('layouts.admin')
@section('contenido')
<div class="col-md-6">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ __('New supplier') }}</h3>
        </div>

        <form action="{{ route('proveedor.store') }}" method="post" class="form">
        @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="nombre">{{ __('Name') }}</label>
                    <input type="text" class="form-control" name="nombre" id="nombre" placeholder="{{ __('Add supplier name') }}">
                </div>
                <div class="form-group">
                    <label for="tipo_documento">{{ __('Document type') }}</label>
                    <select name="tipo_documento" class="form-control" id="tipo_documento">
                        <option value="RFC">LICENCIA</option>
                        <option value="DNI">DNI</option>
                        <option value="PASAPORTE">PASAPORTE</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="nro_documento">{{ __('Document number') }}</label>
                    <input type="text" class="form-control" name="nro_documento" id="nro_documento" placeholder="{{ __('Add document number') }}">
                </div>
                <div class="form-group">
                    <label for="direccion">{{ __('Address') }}</label>
                    <input type="text" class="form-control" name="direccion" id="direccion" placeholder="{{ __('Add address') }}">
                </div>
                <div class="form-group">
                    <label for="telefono">{{ __('Phone number') }}</label>
                    <input type="text" class="form-control" name="telefono" id="telefono" placeholder="{{ __('Add phone number') }}">
                </div>
                <div class="form-group">
                    <label for="email">{{ __('Email') }}</label>
                    <input type="text" class="form-control" name="email" id="email" placeholder="{{ __('Add email') }}">
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-success me-1 mb-1">{{ __('Save') }}</button>
                    <button type="reset" class="btn btn-danger me-1 mb-1">{{ __('Cancel') }}</button>
                </div>
            </div>
        </form>
    </div>
</div>
@stop