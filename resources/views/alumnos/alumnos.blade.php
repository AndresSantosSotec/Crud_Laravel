@extends('layout.template')
@section('title', 'Alumnos | Escuela')

@section('contenido')

<main>
    <div class="container py-4">
        <h2>Listado de alumnos</h2>
        <a href="{{ url('alumnos/create') }}" class="btn btn-primary btn-sm">Nuevo Alumno</a>

        <div class="mt-3">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Matrícula</th>
                        <th>Nombre</th>
                        <th>Fecha de Nacimiento</th>
                        <th>Teléfono</th>
                        <th>Email</th>
                        <th>Nivel</th>
                        <th>Operaciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($alumnos as $alumno)
                        <tr>
                            <td>{{ $alumno->matricula }}</td>
                            <td>{{ $alumno->nombre }}</td>
                            <td>{{ $alumno->fecha_nacimiento }}</td>
                            <td>{{ $alumno->telefono }}</td>
                            <td>{{ $alumno->email }}</td>
                            <td>{{ $alumno->nivel->nombre }}</td>
                            <td>
                                <a href="{{ url('alumnos/'.$alumno->id.'/edit') }}" class="btn btn-success btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                <a href="{{ route('alumnos.destroy', $alumno->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que quieres eliminar esto?')"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</main>
@endsection
