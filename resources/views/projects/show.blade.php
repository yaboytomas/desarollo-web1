@extends('layouts.app')

@section('title', 'Detalles del Proyecto')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2>Detalles del Proyecto</h2>
            <div>
                <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-warning">Editar</a>
                <a href="{{ route('projects.index') }}" class="btn btn-secondary">Volver a la Lista</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th style="width: 200px;">ID</th>
                    <td>{{ $project->id }}</td>
                </tr>
                <tr>
                    <th>Nombre</th>
                    <td>{{ $project->name }}</td>
                </tr>
                <tr>
                    <th>Fecha de Inicio</th>
                    <td>{{ $project->start_date->format('Y-m-d') }}</td>
                </tr>
                <tr>
                    <th>Estado</th>
                    <td>
                        <span class="badge bg-{{ $project->status == 'Completado' ? 'success' : ($project->status == 'En Progreso' ? 'primary' : ($project->status == 'Cancelado' ? 'danger' : 'warning')) }}">
                            {{ $project->status }}
                        </span>
                    </td>
                </tr>
                <tr>
                    <th>Responsable</th>
                    <td>{{ $project->responsible }}</td>
                </tr>
                <tr>
                    <th>Monto</th>
                    <td>${{ number_format($project->amount, 2) }}</td>
                </tr>
                <tr>
                    <th>Fecha de Creación</th>
                    <td>{{ $project->created_at->format('Y-m-d H:i:s') }}</td>
                </tr>
                <tr>
                    <th>Última Actualización</th>
                    <td>{{ $project->updated_at->format('Y-m-d H:i:s') }}</td>
                </tr>
            </table>
            
            <div class="mt-4">
                <form action="{{ route('projects.destroy', $project->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('¿Está seguro que desea eliminar este proyecto?')">Eliminar Proyecto</button>
                </form>
            </div>
        </div>
    </div>
@endsection 