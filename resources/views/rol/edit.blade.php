<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-gray-800 leading-tight">
            {{ __('roles > edit') }}
        </h2>
    </x-slot>

    
    <form action="{{ route('rol.update', $rol->id) }}" method="post">
        @csrf
        @method('put')
        @include('rol.form')
        
    </form>
    
</x-app-layout>
