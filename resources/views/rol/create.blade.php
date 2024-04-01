
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-gray-800 leading-tight">
            {{ __('roles > create') }}
        </h2>
    </x-slot>

    
    <form action="{{ route('rol.store') }}" method="post">
        @csrf
        @include('rol.form')
    </form>
</x-app-layout>
