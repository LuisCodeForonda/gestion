<div class="max-w-lg mx-auto bg-white dark:bg-slate-800 p-4 m-4">
    <div class=" grid gap-6 mb-6">
        <div> 
            <label for="descripcion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descripcion</label>
            <textarea id="descripcion" name="descripcion" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your thoughts here...">{{ $accion->descripcion }}</textarea>          
            <x-input-error :messages="$errors->get('descripcion')" class="mt-2" />
        </div>
        <div>
            <label for="id_equipo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an option</label>
            <select id="id_equipo" name="id_equipo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option value="">Escoge un equipo</option>
            @foreach ($equipos as $equipo)
                <option value="{{ $equipo->id }}" @selected($accion->id_equipo==$equipo->id)>{{ $equipo->descripcion }}</option>
            @endforeach
            </select>
            <x-input-error :messages="$errors->get('id_equipo')" class="mt-2" />
        </div>
    </div>
    <div>
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Guardar</button>
    </div>
</div>

