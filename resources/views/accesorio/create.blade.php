<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-gray-800 leading-tight">
            {{ __('accesorio > create') }}
        </h2>
    </x-slot>

    
    <form action="{{ route('accesorio.store') }}" method="post">
        @csrf
        @include('accesorio.form')
    </form>
</x-app-layout>
