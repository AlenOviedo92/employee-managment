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
                        
                        <form action="{{ route('departments.destroy', [$department->id]) }}" method="POST" style="display:inline;">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection