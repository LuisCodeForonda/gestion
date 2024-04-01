<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-gray-800 leading-tight">
            {{ __('accesorio > edit') }}
        </h2>
    </x-slot>

    
    <form action="{{ route('accesorio.update', $accesorio->id) }}" method="post">
        @csrf
        @method('put')
        @include('accesorio.form')
    </form>
    
</x-app-layout>
