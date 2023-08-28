
@extends('layout.template')
@section('title', 'Editar Alumno | Escuela')

@section('contenido')
<main>
    <div class="container py-4">
        <h2>Editar alumno</h2>

        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Ocurrió un error. Por favor, verifique sus campos.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <form action="{{ route('alumnos.update', $alumno->id) }}" method="POST">
            @method('PUT')
            @csrf

            <div class="mb-3 row">
                <label for="matricula" class="col-sm-2 col-form-label">Matrícula</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="matricula" id="matricula" value="{{ $alumno->matricula }}">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="nombre" class="col-sm-2 col-form-label">Nombre</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="nombre" id="nombre" value="{{ $alumno->nombre }}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="fecha" class="col-sm-2 col-form-label">Fecha de nacimiento</label>
                <div class="col-sm-5">
                    <input type="date" class="form-control" name="fecha" id="fecha" value="{{ $alumno->fecha_nacimiento }}">
                </div>
            </div>
    
            <div class="mb-3 row">
                <label for="telefono" class="col-sm-2 col-form-label">Teléfono</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="telefono" id="telefono" value="{{ $alumno->telefono }}">
                </div>
            </div>
    
            <div class="mb-3 row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-5">
                    <input type="email" class="form-control" name="email" id="email" value="{{ $alumno->email }}">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="nivel" class="col-sm-2 col-form-label">Nivel:</label>
                <div class="col-sm-5">
                    <div class="form-group">
                        <select class="form-control" id="nivel" name="nivel">
                            <option value="">Seleccionar nivel</option>
                            @foreach ($niveles as $nivel)
                                <option value="{{ $nivel->id }}" {{ $alumno->nivel_id == $nivel->id ? 'selected' : '' }}>{{ $nivel->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <!-- ... Otros campos del formulario ... -->
            <div class="mb-3 row">
                <div class="col-sm-2"></div>
                <div class="col-sm-5">
                    <button type="submit" class="btn btn-success">Actualizar</button>
                    
                    <a href="{{ route('alumnos.index') }}" class="btn btn-secondary">Regresar</a>
                </div>
            </div>
        </form>
    </div>
</main>
@endsection
