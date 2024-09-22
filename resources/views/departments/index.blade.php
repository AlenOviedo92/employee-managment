@extends('app')

@section('content')
    <div class="container w-25 border p-4 my-4">
        <div class="row mx-auto">
        <form action="{{ route('departments.store') }}" method="POST">
            @csrf                                                               <!-- Directiva que sirve de token, ayuda a proteger la sesión -->
            
            @if (session('success'))                                            <!-- Directiva condicional para poner mensaje exitoso -->          
                <h6 class="alert alert-success">{{ session('success') }}</h6>
            @endif

            @error('name')                                                      <!-- Directiva cuando ocurre un error -->
                <h6 class="alert alert-danger">{{ $message }}</h6>
            @enderror

            <div class="mb-3 text-center">
                <h3>Crear departamamento</h3>
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Nombre:</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            
            <button type="submit" class="btn btn-primary w-100">Crear nuevo departamento</button>
        </form>
        </div>
    </div>
@endsection