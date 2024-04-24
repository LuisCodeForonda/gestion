<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-gray-800 leading-tight">
            {{ __('accesorio > edit') }}
        </h2>
    </x-slot>

    
    <form action="{{ route('accesorio.update', $accesorio) }}" method="post">
        @csrf
        @method('put')
        <input type="hidden" name="slug" value={{ $slug }}>
        @include('accesorio.form')
    </form>
    
</x-app-layout>
