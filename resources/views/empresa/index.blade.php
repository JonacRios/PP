@extends('welcome')
@section('title', 'Empresas')
@push('css')
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" type="text/css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endpush
@section('content')
@if (session('success'))
<script>
    let message = "{{ session('success') }}";
    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 1500,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.onmouseenter = Swal.stopTimer;
            toast.onmouseleave = Swal.resumeTimer;
        }
    });
    Toast.fire({
        icon: "success",
        title: message
    });
</script>
@endif
    <div class="container-fluid px-4">
        <h1 class="mt-4">Empresas</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Empresas</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header row align-items-center">
                <div class="col">
                    <i class="fas fa-table me-1"></i>
                    Tabla Empresas
                </div>
                <div class="col text-end">
                    <a href="{{ route('empresas.create') }}" class="btn btn-primary">Crear Empresa</a>
                </div>
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Direccion</th>
                            <th>Telefono</th>
                            <th>Correo</th>
                            <th>Logo</th>
                            <th>Sitio Web</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($empresas as $empresa)
                            <tr>
                                <td>{{ $empresa->nombre }}</td>
                                <td>{{ $empresa->direccion }}</td>
                                <td>{{ $empresa->telefono }}</td>
                                <td>{{ $empresa->email }}</td>
                                <td>{{ $empresa->img_path}}</td>
                                <td>{{ $empresa->sitio_web }}</td>
    
                                <td>
                                    <a href="{{ route('empresas.edit', $empresa) }}" class="btn btn-warning">Editar</a>
                                    <form class="d-inline">
                                           <button type="button" class="btn btn-danger"
                                           data-bs-toggle="modal" data-bs-toggle="modal" data-bs-target="#confirmarmodal-{{$empresa->id}}">Eliminar</button>
                                        
                                    </form>
                                </td>
                            </tr>
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal fade" id="confirmarmodal-{{$empresa->id}}" tabindex="-1" aria-labelledby="confirmarmodal"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="confirmarmodal">Mensaje de confirmación</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>¿Está seguro de eliminar la empresa?</p>
                                        
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Cancelar</button>
                                                <form action="{{route('empresas.destroy', ['empresa'=>$empresa->id])}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                <button type="submit" class="btn btn-primary">Confirmar</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Nombre</th>
                            <th>Direccion</th>
                            <th>Telefono</th>
                            <th>Correo</th>
                            <th>Logo</th>
                            <th>Sitio Web</th>
                            <th>Acciones</th>
                        </tr>
                    </tfoot>

                </table>
            </div>
        </div>
    </div>



@endsection
@push('js')
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" type="text/javascript"></script>
    <script src="{{ asset('js/datatables-simple-demo.js') }}"></script>
@endpush
