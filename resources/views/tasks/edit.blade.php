@extends('layouts.app')

@section('content')
    <div class="container my-5">
        
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                
                <h1 class="mb-4 text-center">Editar Tarea</h1>

                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="card shadow-sm">
                    <div class="card-body p-4">
                        <form action="{{ route('tasks.update', $task->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            
                            <div class="mb-3">
                                <label for="name" class="form-label fw-bold">Nombre</label>
                                <input type="text" class="form-control" id="name" name="name" required value="{{ $task->name }}">
                            </div>
                            
                            <div class="mb-4">
                                <label for="description" class="form-label fw-bold">Descripción</label>
                                <textarea class="form-control" id="description" name="description" rows="3">{{ $task->description }}</textarea>
                            </div>

                            <div class="form-check form-switch fs-4 mb-4">
                                <input type="hidden" name="completed" value="0">
                                <input class="form-check-input" type="checkbox" id="completed" name="completed" value="1" {{ $task->completed ? 'checked' : '' }}>
                                <label class="form-check-label" for="completed">Completada</label>
                            </div>
                            
                            <div class="d-flex justify-content-end gap-2 border-top pt-3 mt-2">
                                <a href="{{ route('tasks.index') }}" class="btn btn-outline-secondary">Cancelar</a>
                                <button type="submit" class="btn btn-primary">Actualizar</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
        
    </div>
@endsection