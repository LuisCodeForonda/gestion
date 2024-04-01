<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>

    <x-slot name="slot">
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Consequatur minima inventore incidunt quisquam sit et minus quae excepturi itaque fugiat error reprehenderit, ipsam cumque eaque dolor neque impedit adipisci earum.</p>
    </x-slot>
</x-app-layout>
