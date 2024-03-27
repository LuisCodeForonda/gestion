
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-gray-800 leading-tight">
            {{ __('marcas > create') }}
        </h2>
    </x-slot>

    
    <form action="{{ route('marca.store') }}" method="post">
        @csrf
        @include('marca.form')
    </form>
</x-app-layout>
