@extends('layouts.app')

@section('title', 'accesorio')

@section('content')
    Accesorios
    <a href="{{ route('accesorio.create') }}">Nuevo</a>

    <ul>
        @foreach ($accesorios as $accesorio)
            <li>{{ $accesorio->descripcion }} - {{ $accesorio->marca->nombre }}<a href="{{ route('accesorio.edit', $accesorio->id) }}">Editar</a>|
                <form action="{{ route('accesorio.destroy', $accesorio->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <input type="submit" value="Eliminar">
                </form>
            </li>
        @endforeach
    </ul>
@endsection
    