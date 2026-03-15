@extends('layouts.app')

@section('content')
    <div class="container my-5 text-center">

        <h1 class="display-4 fw-bold mb-3">Bienvenido a {{config('app.name')}}</h1>
        <p class="lead text-muted mb-5">Organiza tu día y aumenta tu productividad fácilmente.</p>
        <p> Para el ejemplo, puedes utilizar los usuarios de prueba.
        <ul class="list-unstyled">
            <li>
                admin@correo.com

            </li>
            <li>
                editor@correo.com
            </li>
            <li>
                user@correo.com
            </li>
        </ul>
        <p>Contraseña: password</p>
        </p>

        <div>
            @auth
                <a href="{{ route('tasks.index') }}" class="btn btn-primary btn-lg px-4">Ir a mis tareas</a>
            @else
                <a href="{{ route('login') }}" class="btn btn-primary btn-lg px-4 me-3">Iniciar Sesión</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="btn btn-outline-secondary btn-lg px-4">Registrarse</a>
                @endif
            @endauth
        </div>

    </div>
@endsection