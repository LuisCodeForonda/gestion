<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-gray-800 leading-tight">
            {{ __('Marcas') }}
        </h2>
    </x-slot>

    
    <a href="{{ route('marca.create') }}">Nuevo</a>

    <ul>
        @foreach ($marcas as $marca)
            <li>{{ $marca->nombre }} - <a href="{{ route('marca.edit', $marca->id) }}">Editar</a>|
                <form action="{{ route('marca.destroy', $marca->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <input type="submit" value="Eliminar">
                </form>
            </li>
        @endforeach
    </ul>
</x-app-layout>

    