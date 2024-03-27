<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-gray-800 leading-tight">
            {{ __('marcas > edit') }}
        </h2>
    </x-slot>

    
    <form action="{{ route('marca.update', $marca->id) }}" method="post">
        @csrf
        @method('put')
        @include('marca.form')
    </form>
    
</x-app-layout>
