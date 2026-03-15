@extends('layouts.app')

@section('content')
<div class="container my-5">

    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-8">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1>Usuarios</h1>
            </div>

            <div class="card shadow-sm">
                <ul class="list-group list-group-flush">

                    @forelse ($users as $user)
                    <li class="list-group-item p-3">
                        <div class="row align-items-center">

                            <div class="col-md-5">
                                <strong>{{ $user->name }}</strong>
                            </div>
                            <div class="col-md-4">
                                <span class="badge bg-secondary">{{ $user->email }}</span>
                            </div>

                        </div>
                    </li>
                    @empty
                    <li class="list-group-item text-center p-4 text-muted">
                        No hay usuarios registrados aún.
                    </li>
                    @endforelse

                </ul>
            </div>

        </div>
    </div>

</div>
@endsection