@extends('app')

@section('content')
    <!-- <div class="container w-25 border p-4 my-4"> -->
    @if($department->employees->count() > 0)
        <div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Bucle para recorrer los empleados y llenar la tabla -->
                    @foreach ($employees as $employee)
                    <tr>
                        <th scope="row">{{ $employee->id }}</th>
                        <td><a href="{{ route('employees-edit', ['id' => $employee->id]) }}">{{ $employee->name }}</a></td>
                        <td>
                            <form action="{{ route('employees-destroy', [$employee->id]) }}" method='POST'>
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        No hay empleados en este departamento
    @endif
@endsection