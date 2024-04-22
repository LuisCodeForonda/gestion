<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-gray-800 leading-tight">
            {{ __('equipo > add > accion') }}
        </h2>
    </x-slot>

    <form action="{{ route('equipo.store-accion', $equipo) }}" method="post">
        @csrf
        @include('accion.form')
    </form>
    
</x-app-layout>

    