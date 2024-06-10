<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-gray-800 dark:text-slate-200 leading-tight">
            {{ __('persona') }}
        </h2>
    </x-slot>

    <div class="container mx-auto">
        @livewire('persona-component')
    </div>
   
</x-app-layout>