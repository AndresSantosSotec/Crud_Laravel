@extends('layout/template')
@section('title','Alumnos | Escuela')

@section('contenido')
<main>
    <div class="container py-4">
        <h2>Listado de alumnos</h2>
        <a href="{{ url('alumnos/create') }}" class="btn btn-primary btn-sm">Nuevo Alumno</a>
        <a href="{{ url('alumnos') }}" class="btn btn-secondary">Regresar</a>
    </div>
</main>
@endsection
