<div class="max-w-lg mx-auto bg-white dark:bg-slate-800 p-4 m-4">
    <div class="grid gap-6 mb-6">
        <div> 
            <label for="descripcion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descripcion</label>
            <textarea id="descripcion" name="descripcion" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your thoughts here...">{{ $accesorio->descripcion }}</textarea>          
            <x-input-error :messages="$errors->get('descripcion')" class="mt-2" />
        </div>
        <div>
            <label for="id_equipo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an option</label>
            <select id="id_equipo" name="id_equipo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option value="">Escoge un equipo</option>
            @foreach ($equipos as $equipo)
                <option value="{{ $equipo->id }}" @selected($equipo->id == $accesorio->id_equipo)>{{ $equipo->descripcion }}</option>
            @endforeach
            </select>
            <x-input-error :messages="$errors->get('id_equipo')" class="mt-2" />
        </div>
        <div>
            <label for="id_marca" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an option</label>
            <select id="id_marca" name="id_marca" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option value="">Escoge una marca</option>
            @foreach ($marcas as $marca)
                <option value="{{ $marca->id }}" @selected($marca->id == $accesorio->id_marca)>{{ $marca->nombre }}</option>
            @endforeach
            </select>
        </div>
        <div>
            <label for="modelo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Modelo</label>
            <input type="text" id="modelo" name="modelo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ $accesorio->modelo }}" />
        </div>
        <div>
            <label for="serie" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Serie</label>
            <input type="text" id="serie" name="serie" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ $accesorio->serie }}" />
        </div>
        <div>
            <label for="cantidad" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cantidad</label>
            <input type="number" id="cantidad" name="cantidad" min="1" aria-describedby="helper-text-explanation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required value="{{ $accesorio->cantidad ? $accesorio->cantidad : 1 }}"/>
        </div>
    </div>
    <div>
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Guardar</button>
    </div>
</div>

