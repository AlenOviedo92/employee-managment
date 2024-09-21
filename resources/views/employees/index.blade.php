@extends('app')                                                                 <!-- Con esta Directiva estoy importando la plantilla base llamada app -->

@section('content')                                                             <!-- Para acceder a la sección content creada en app.blade.php -->
    <div class="container w-25 border p-4 mt-4">
        <form action="{{ route('employees') }}" method="POST">
            @csrf                                                               <!-- Directiva que sirve de token, ayuda a proteger la sesión -->
            
            @if (session('success'))                                            <!-- Directiva condicional para poner mensaje exitoso -->          
                <h6 class="alert alert-success">{{ session('success') }}</h6>
            @endif

            @error('name')                                                      <!-- Directiva cuando ocurre un error -->
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

            <div class="mb-3">
                <h3>Crear Nuevo Empleado</h3>
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Nombre:</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="mb-3">
                <label for="puesto" class="form-label">Puesto:</label>
                <input type="text" class="form-control" id="puesto" name="puesto">
            </div>
            <div class="mb-3">
                <label for="salario" class="form-label">Salario(COP):</label>
                <input type="number" class="form-control" id="salario" name="salario">
            </div>
            <div class="mb-3">
                <label for="fecha" class="form-label">Fecha de contratación:</label>
                <input type="date" class="form-control" id="fecha" name="fecha">
            </div>
            <button type="submit" class="btn btn-primary">Crear nuevo empleado</button>
        </form>
    </div>
@endsection