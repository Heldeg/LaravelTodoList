@extends('layouts.app')

@section('content')
    <div class="container my-5"> <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6"> 
                
                <h1 class="mb-4 text-center">Detalle de la Tarea</h1>

                <div class="card shadow-sm">
                    <div class="card-body p-4">
                        <h2 class="card-title h4 mb-4">{{ $task->name }}</h2>
                        
                        <h6 class="card-subtitle mb-2 text-muted">Descripción</h6>
                        <p class="card-text mb-4">{{ $task->description ?? 'Sin descripción.' }}</p>
                        
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="badge {{ $task->completed ? 'bg-success' : 'bg-secondary' }}">
                                {{ $task->completed ? 'Completada' : 'Pendiente' }}
                            </span>
                            <small class="text-muted text-end">
                                Creada: {{ $task->created_at->format('d/m/Y H:i') }}
                            </small>
                        </div>
                    </div>

                    <div class="card-footer bg-light p-3 d-flex justify-content-end gap-2">
                        <a href="{{ route('tasks.index') }}" class="btn btn-outline-secondary">Volver</a>
                        <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-primary">Editar</a>
                        
                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="m-0">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminarla?')">
                                Eliminar
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection