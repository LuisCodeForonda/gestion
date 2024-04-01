<div class="max-w-lg mx-auto bg-white p-4 m-4">
    <div class="grid gap-6 mb-6">
        <div>
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre</label>
            <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required value="{{ $rol->name }}" />
        </div>
        <div class="grid grid-cols-2">
            @foreach ($permisos as $permiso)
            <div class="flex items-center mb-2">
                <input id="{{ $permiso->id }}" name="permisos[]" type="checkbox" value="{{ $permiso->name }}" @checked($permiso->pivot) class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="{{ $permiso->id }}" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $permiso->name }}</label>
            </div>
            @endforeach
        </div>
    </div>
    <div>
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Guardar</button>
    </div>
</div>
