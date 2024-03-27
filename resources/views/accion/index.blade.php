@extends('layouts.app')

@section('title', 'accion')

@section('content')
    accions
    <a href="{{ route('accion.create') }}">Nuevo</a>

    <ul>
        @foreach ($accions as $accion)
            <li>{{ $accion->descripcion }} - {{ $accion->equipos->descripcion }}<a href="{{ route('accion.edit', $accion->id) }}">Editar</a>|
                <form action="{{ route('accion.destroy', $accion->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <input type="submit" value="Eliminar">
                </form>
            </li>
        @endforeach
    </ul>
@endsection
    