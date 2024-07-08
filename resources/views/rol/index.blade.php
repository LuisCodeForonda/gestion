<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-gray-800 leading-tight">
            {{ __('roles') }}
        </h2>
    </x-slot>

    <div class="container mx-auto">
        @livewire('rol-component')
    </div>
</x-app-layout>

    