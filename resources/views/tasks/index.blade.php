@extends('layouts.app')

@section('content')
    <div class="container my-5">

        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8">

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h1>Tareas</h1>
                    @hasanyrole(['admin', 'editor'])
                        <a href="{{ route('tasks.create') }}" class="btn btn-primary">Crear Tarea</a>
                    @endhasanyrole
                </div>

                <div class="card shadow-sm">
                    <ul class="list-group list-group-flush">

                        @forelse ($tasks as $task)
                            <li class="list-group-item p-3">
                                <div class="row align-items-center">

                                    <div class="col-md-5">
                                        <a href="{{ route('tasks.show', $task->id) }}"
                                            class="fw-bold text-decoration-none {{ $task->completed ? 'text-decoration-line-through text-muted' : '' }}">
                                            {{ $task->name }}
                                        </a>
                                        <span class="badge {{ $task->completed ? 'bg-success' : 'bg-secondary' }} ms-2">
                                            {{ $task->completed ? 'Completada' : 'Pendiente' }}
                                        </span>
                                    </div>

                                    <div class="col-md-4">
                                        <p class="text-truncate text-muted mb-0" title="{{ $task->description }}">
                                            {{ $task->description }}
                                        </p>
                                    </div>

                                    <div class="col-md-3 text-end">
                                        @hasanyrole(['admin', 'editor'])
                                        <a href="{{ route('tasks.edit', $task->id) }}"
                                            class="btn btn-sm btn-outline-secondary">Editar</a>
                                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger"
                                                onclick="return confirm('¿Eliminar tarea?')">Eliminar</button>
                                        </form>
                                        @endhasanyrole
                                    </div>

                                </div>
                            </li>
                        @empty
                            <li class="list-group-item text-center p-4 text-muted">
                                No hay tareas registradas aún.
                            </li>
                        @endforelse

                    </ul>
                </div>

            </div>
        </div>

    </div>
@endsection