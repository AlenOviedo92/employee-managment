@extends('app') <!-- Importo la plantilla base llamada app -->

@section('content') 
    <div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Email</th>
                    <th scope="col">Puesto</th>
                    <th scope="col">Salario</th>
                    <th scope="col">Fecha de contratación</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <!-- Bucle para recorrer los empleados y llenar la tabla -->
                @foreach ($employees as $employee)
                <tr>
                    <th scope="row">{{ $employee->id }}</th>
                    <td>{{ $employee->name }}</td>
                    <td>{{ $employee->email }}</td>
                    <td>{{ $employee->puesto }}</td>
                    <td>{{ $employee->salario }}</td>
                    <td>{{ $employee->fecha }}</td>
                    <td>
                        <!-- Botones para editar o eliminar -->
                        <a href="{{ route('employees-edit', ['id' => $employee->id]) }}" class="btn btn-primary btn-sm">Editar</a>
                        
                        <form action="{{ route('employees-destroy', [$employee->id]) }}" method="POST" style="display:inline;">
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