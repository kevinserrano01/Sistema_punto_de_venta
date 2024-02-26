@extends('layouts.admin')
@section('contenido')
<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ __('New Product') }}</h3>
        </div>
        {{-- card-header --}}
        {{-- form start --}}
        <form action="{{ route('producto.store') }}" method="post" enctype="multipart/form-data" class="form">
        @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="nombre">{{ __('Name') }}</label>
                            <input type="text" class="form-control" name="nombre" id="nombre" placeholder="{{ __('Add product name') }}">
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label>Categoria</label>
                            <select name="id_categoria" class="form-control" id="id_categoria">
                                @foreach ($categorias as $cat)
                                    <option value="{{ $cat->id_categoria }}">{{ $cat->categoria }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="codigo">{{ __('Code') }}</label>
                            <input type="text" class="form-control" name="codigo" id="codigo" placeholder="{{ __('Add product code') }}">
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="stock">{{ __('Stock') }}</label>
                            <input type="text" class="form-control" name="stock" id="stock" placeholder="{{ __('Add Stock') }}">
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="descripcion">{{ __('Description') }}</label>
                            <input type="text" class="form-control" name="descripcion" id="descripcion" placeholder="{{ __('Add product description') }}">
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="descripcion">{{ __('Image') }}</label>
                            <input type="file" class="form-control" name="imagen" id="imagen">
                        </div>
                    </div>
                    
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