<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-gray-800 leading-tight">
            {{ __('equipos') }}
        </h2>
    </x-slot>

 
    <div class="flex justify-between items-center">
        <a href="{{ route('equipo.create') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Nuevo</a>
    </div>
    
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Descripcion
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Modelo
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Serie
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Estado
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($equipos as $equipo)
                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $equipo->descripcion }}
                    </th>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $equipo->modelo }}
                    </th>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $equipo->serie }}
                    </th>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $equipo->estado }}
                    </th>
                    <td class="px-6 py-4 flex gap-4">
                        <a href="{{ route('equipo.show', $equipo->slug) }}" class="font-medium text-yellow-600 dark:text-yellow-500 hover:underline">Ver</a>
                        <a href="{{ route('equipo.edit', $equipo->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Editar</a>
                        <form action="{{ route('equipo.destroy', $equipo->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <input type="submit" value="Eliminar" class="font-medium text-red-600 dark:text-red-500 hover:underline">
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $equipos->links() }}
    </div>
</x-app-layout>

    
    