@extends('welcome')
@section('title', 'Crear Empresas')
@push('css')
    <style>
        #description {
            resize: none;
        }
    </style>
@endpush
@section('content')

    <div class="container-fluid px-4">
        <h1 class="mt-4">Empresas</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Crear empresa</a></li>
        </ol>
    </div>
    <div class="card mb-3">
        <div class="card-header row align-items-center">
            <div class="col">
                <i class="fas fa-table me-1"></i>
                Crear Empresa
            </div>
            <div class="col text-end">
                <a href="{{ route('empresas.index') }}" class="btn btn-primary">Volver</a>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('empresas.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="name" name="nombre" value={{ old('nombre') }}>
                        @error('nombre')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="direccion" class="form-label">Direcccion</label>
                        <input type="text" class="form-control" id="description" name="direccion"
                            rows="3">{{ old('direccion') }}</input>
                        @error('direccion')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="telefono" class="form-label">Telefono</label>
                        <input type="number" class="form-control" id="telefono" name="telefono"
                            rows="3">{{ old('telefon') }}</input>
                        @error('telefon')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="email" class="form-label">Email</label>
                        <input class="form-control" id="email" name="email" rows="3">{{ old('email') }}</input>
                        @error('email')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="sitio_web" class="form-label">Sitio web</label>
                        <input class="form-control" id="sitio_web" name="sitio_web" rows="3">
                            {{ old('sitio_web') }}</input>
                            @error('sitio_web')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="img_path" class="form-label">Imagen:</label>
                        <input type="file" name="img_path" id="img_path" class="form-control" accept="image/*">
                        @error('img_path')
                        <small class="text-danger">{{'*'.$message}}</small>
                        @enderror
                    </div>
                    <div class= "d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary ">Guardar</button>
                    </div>
                </div>
            </form>
        </div>
    @endsection
    @push('js')
    @endpush
