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
        <div class="container mx-auto py-4 grid grid-cols-4 grid-rows-4 gap-4">
            <div class="bg-white p-2 rounded-md">
                <h1>Usuarios</h1>
                <img src="" alt="">
                <p>{{ $users }} registrados</p>
                <a href="">ver</a>
            </div>
            <div class="bg-white p-2 rounded-md">
                <h1>Equipos</h1>
                <img src="" alt="">
                <p>{{ $equipos }} registrados</p>
                <a href="">ver</a>
            </div>
            <div class="bg-white p-2 rounded-md">
                <h1>Marcas</h1>
                <img src="" alt="">
                <p>{{ $marcas }} registrados</p>
                <a href="">ver</a>
            </div>
            <div class="row-span-3 bg-white p-2 rounded-md">
                <h1>Ultimas acciones realizadas</h1>
                <img src="" alt="">
                <p>el usuario name registro</p>
                <a href="">ver</a>
            </div>
            <div class="bg-white p-2 rounded-md">
                <h1>Accesorios</h1>
                <img src="" alt="">
                <p>{{ $accesorios }} registrados</p>
                <a href="">ver</a>
            </div>
            <div class="bg-white p-2 rounded-md">
                <h1>Acciones</h1>
                <img src="" alt="">
                <p>{{ $acciones }} registrados</p>
                <a href="">ver</a>
            </div>
            <div class="bg-white p-2 rounded-md">
                <h1>Matenimiento</h1>
                <img src="" alt="">
                <p>{{ $mantenimiento }} equipos necesitan mantenimiento</p>
                <a href="">ver</a>
            </div>
            <div class="bg-white p-2 rounded-md">
                <h1>Stand By</h1>
                <img src="" alt="">
                <p>{{ $mantenimiento }} equipos estan en espera</p>
                <a href="">ver</a>
            </div>
            <div class="bg-white p-2 rounded-md">
                <h1>Operativo</h1>
                <img src="" alt="">
                <p>{{ $mantenimiento }} equipos estan en funcionamiento</p>
                <a href="">ver</a>
            </div>
            <div class="bg-white p-2 rounded-md">
                <h1>Malo</h1>
                <img src="" alt="">
                <p>2{{ $mantenimiento }} equipos estan en obsoletos</p>
                <a href="">ver</a>
            </div>
        </div>
      
    </x-slot>
</x-app-layout>
