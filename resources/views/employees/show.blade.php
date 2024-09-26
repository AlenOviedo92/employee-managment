@extends('app')                                                                                 <!-- Con esta Directiva estoy importando la plantilla base llamada app -->

@section('content')                                                                             <!-- Para acceder a la sección content creada en app.blade.php -->
    <div class="container w-25 border p-4 mt-4">
        <form action="{{ route('employees-update', ['id' => $employee->id]) }}" method="POST">
            @csrf                                                                               <!-- Directiva que sirve de token, ayuda a proteger la sesión -->
            @method('PATCH')                                                                    <!-- Directiva para que Laravel reconozca el método PATCH -->
            
            @if (session('success'))                                                            <!-- Directiva condicional para poner mensaje exitoso -->          
                <h6 class="alert alert-success">{{ session('success') }}</h6>
            @endif

            @error('name')                                                                      <!-- Directiva cuando ocurre un error -->
                <h6 class="alert alert-danger">{{ $message }}</h6>
            @enderror

            @error('email')                        
                <h6 class="alert alert-danger">{{ $message }}</h6>
            @enderror

            @error('puesto')                        
                <h6 class="alert alert-danger">{{ $message }}</h6>
            @enderror

            @error('salario')                        
                <h6 class="alert alert-danger">{{ $message }}</h6>
            @enderror

            @error('fecha')                        
                <h6 class="alert alert-danger">{{ $message }}</h6>
            @enderror

            @error('department_id')                        
                <h6 class="alert alert-danger">{{ $message }}</h6>
            @enderror

            <div class="mb-3">
                <h3>Actualizar empleado</h3>
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Nombre:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $employee->name }}">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $employee->email }}">
            </div>
            <div class="mb-3">
                <label for="puesto" class="form-label">Puesto:</label>
                <input type="text" class="form-control" id="puesto" name="puesto" value="{{ $employee->puesto }}">
            </div>
            <div class="mb-3">
                <label for="salario" class="form-label">Salario(COP):</label>
                <input type="number" class="form-control" id="salario" name="salario" value="{{ $employee->salario }}">
            </div>
            <div class="mb-3">
                <label for="fecha" class="form-label">Fecha de contratación:</label>
                <input type="date" class="form-control" id="fecha" name="fecha" value="{{ $employee->fecha }}">
            </div>
            <div class="mb-3">
                <label for="department_id" class="form-label">Departamento de residencia:</label>
                <select name="department_id" class="form-control" id="department_id">
                    <option value="">Selecciona un departamento</option>
                    @foreach ($departments as $department)
                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar empleado</button>
        </form>
    </div>
@endsection