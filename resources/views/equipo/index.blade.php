@extends('layouts.app')

@section('title', 'equipo')

@section('content')
    equipos
    <a href="{{ route('equipo.create') }}">Nuevo</a>

    <ul>
        @foreach ($equipos as $equipo)
            <li>{{ $equipo->descripcion }} - <a href="{{ route('equipo.edit', $equipo->id) }}">Editar</a>|
                <form action="{{ route('equipo.destroy', $equipo->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <input type="submit" value="Eliminar">
                </form>
            </li>
        @endforeach
    </ul>
@endsection
    