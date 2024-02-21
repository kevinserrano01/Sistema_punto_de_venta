@extends('layouts.admin')
@section('contenido')
<div class="col-md-6">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ __('New Category') }}</h3>
        </div>
        {{-- card-header --}}
        {{-- form start --}}
        <form action="{{ route('categoria.store') }}" method="post" class="form">
        @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="categoria">{{ __('Name') }}</label>
                    <input type="text" class="form-control" name="categoria" id="categoria" placeholder="{{ __('Add category name') }}">
                </div>
                <div class="form-group">
                    <label for="descripcion">{{ __('Description') }}</label>
                    <input type="text" class="form-control" name="descripcion" id="descripcion" placeholder="{{ __('Add Description') }}">
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