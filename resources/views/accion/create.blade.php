<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-gray-800 leading-tight">
            {{ __('accion > create') }}
        </h2>
    </x-slot>

    
    <form action="{{ route('accion.store') }}" method="post">
        @csrf
        <input type="hidden" name="slug" value="{{ $slug }}">
        @include('accion.form')
    </form>
</x-app-layout>

    