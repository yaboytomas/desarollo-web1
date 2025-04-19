@extends('layouts.app')

@section('title', 'Lista de Proyectos')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2>Lista de Proyectos</h2>
            <a href="{{ route('projects.create') }}" class="btn btn-primary">Añadir Nuevo Proyecto</a>
        </div>
        <div class="card-body">
            @if(count($projects) > 0)
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Fecha de Inicio</th>
                                <th>Estado</th>
                                <th>Responsable</th>
                                <th>Monto</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($projects as $project)
                                <tr>
                                    <td>{{ $project->id }}</td>
                                    <td>{{ $project->name }}</td>
                                    <td>{{ $project->start_date->format('Y-m-d') }}</td>
                                    <td>{{ $project->status }}</td>
                                    <td>{{ $project->responsible }}</td>
                                    <td>${{ number_format($project->amount, 2) }}</td>
                                    <td class="d-flex gap-1">
                                        <a href="{{ route('projects.show', $project->id) }}" class="btn btn-info btn-sm">Ver</a>
                                        <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                        <form action="{{ route('projects.destroy', $project->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Está seguro que desea eliminar este proyecto?')">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="alert alert-info">
                    No se encontraron proyectos. <a href="{{ route('projects.create') }}">Cree su primer proyecto</a>.
                </div>
            @endif
        </div>
    </div>
@endsection 