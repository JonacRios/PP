@extends('welcome')
@section('title', 'Editar empresa')
@push('css')
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" type="text/css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        #description {
            resize: none;
        }
    </style>
@endpush
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Editar Empleados</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Editar Empleados</a></li>
    </ol>
    <div class="card mb-4">
        <div class="card-header row align-items-center">
            <div class="col">
                <i class="fas fa-table me-1"></i>
                Editar Empleados
            </div>
            <div class="col text-end">
                <a href="{{ route('empleados.index') }}" class="btn btn-primary">Volver</a>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('empleados.update', ['empleados' => $empleados]) }}" method="POST">
                @method('PATCH')
                @csrf
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="primer_nombre" class="form-label">Primer Nombre</label>
                        <input type="text" class="form-control" id="name" name="primer_nombre" value={{ $empleado->primer_nombre}}>
                        @error('primer_nombre')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="segundo_nombre" class="form-label">Segundo Nombre</label>
                        <input type="text" class="form-control" id="segundo_nombre" name="segundo_nombre"
                            rows="3" value={{ $empresa->direccion}}></input>
                        @error('segundo_nombre')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="telefono" class="form-label">Telefono</label>
                        <input type="number" class="form-control" id="telefono" name="telefono"
                            rows="3" value={{ $empresa->telefono}}></input>
                        @error('telefon')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="email" class="form-label">Email</label>
                        <input class="form-control" id="email" name="email" rows="3" value={{ $empresa->email}}></input>
                        @error('email')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="empresa_id" class="form-label">Trabaja en</label>
                        <input class="form-control" id="empresa_id" name="empresa_id" rows="3" value={{ $empleado->empresa->name}}>
                            </input>
                            @error('empresa_id')
                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                            @enderror
                    </div>
                   
                </div>
                <div class="mb-3 d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                    <button type="reset" class="btn btn-secondary">Reiniciar</button>
                </div>
            </form>
        </div>
</div>
@endsection
@push('scripts')
@endpush