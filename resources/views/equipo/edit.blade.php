<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-gray-800 leading-tight">
            {{ __('equipo > edit') }}
        </h2>
    </x-slot>

    
    <form action="{{ route('equipo.update', $equipo->id) }}" method="post">
        @csrf
        @method('put')
        @include('equipo.form')
    </form>
    
</x-app-layout>

    