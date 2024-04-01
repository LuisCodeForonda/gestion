<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-gray-800 leading-tight">
            {{ __('usuario > edit') }}
        </h2>
    </x-slot>

    
    <form action="{{ route('usuario.update', $usuario) }}" method="post">
        @csrf
        @method('put')
        @include('usuario.form',['mostrar' => false])
    </form>
    
</x-app-layout>
