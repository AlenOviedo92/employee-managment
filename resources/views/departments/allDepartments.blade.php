@extends('app') <!-- Importo la plantilla base llamada app -->

@section('content') 
    <div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                </tr>
            </thead>
            <tbody>
                <!-- Bucle para recorrer los empleados y llenar la tabla -->
                @foreach ($departments as $department)
                <tr>
                    <th scope="row">{{ $department->id }}</th>
                    <td>{{ $department->name }}</td>
                    <td>
                        <!-- Botón para eliminar -->
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal-{{ $department->id }}">
                            Eliminar
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="modal-{{ $department->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Información importante</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Al eliminar el departamento <strong>{{$department->name}}</strong> se eliminan todos los empleados asociados al mismo, ¿Está seguro que desea eliminar el departamento <strong>{{$department->name}}</strong>?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                    <form action="{{ route('departments.destroy', ['department' => $department->id]) }}" method='POST'>
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                    </form>
                                </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection