<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-gray-800 leading-tight">
            {{ __('equipo > create') }}
        </h2>
    </x-slot>

    <form action="{{ route('equipo.store') }}" method="post">
        @csrf
        @include('equipo.form')
    </form>
</x-app-layout>

    