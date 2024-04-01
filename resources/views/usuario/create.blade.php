
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-gray-800 leading-tight">
            {{ __('usuarios > create') }}
        </h2>
    </x-slot>

    
    <form action="{{ route('usuario.store') }}" method="post">
        @csrf
        @include('usuario.form', ['mostrar' => true])
    </form>
</x-app-layout>
