<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-gray-800 leading-tight">
            {{ __('equipo > add > accesorio') }}
        </h2>
    </x-slot>

    <form action="{{ route('equipo.store-accesorio', $equipo) }}" method="post">
        @csrf
        @include('accesorio.form')
    </form>
</x-app-layout>

    