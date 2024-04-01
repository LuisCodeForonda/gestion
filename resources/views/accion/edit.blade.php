<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-gray-800 leading-tight">
            {{ __('accion > edit') }}
        </h2>
    </x-slot>

    
    <form action="{{ route('accion.update', $accion->id) }}" method="post">
        @csrf
        @method('put')
        @include('accion.form')
    </form>
    
</x-app-layout>

    