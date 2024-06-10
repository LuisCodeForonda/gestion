<div>
    {{-- In work, do what you enjoy. --}}
    @if ($isOpen)
    <x-modals :title="('Formulario Equipo')">
        <form wire:submit="store" class="p-4 md:p-5">
            <div class="grid gap-4 mb-4">
                <div> 
                    <label for="descripcion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descripcion</label>
                    <textarea id="descripcion" wire:model="descripcion" name="descripcion" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your thoughts here..."></textarea>          
                    <x-input-error :messages="$errors->get('descripcion')" class="mt-2" />
                </div>
                <div>
                    <label for="marca_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Selecciona un marca</label>
                    <select id="marca_id" wire:model="marca_id" name="marca_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="">Escoge una marca</option>
                    @foreach ($marcas as $marca)
                        <option value="{{ $marca->id }}" @selected($marca_id == $marca->id)>{{ $marca->nombre }}</option>
                    @endforeach
                    </select>
                </div>
                <div>
                    <label for="modelo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Modelo</label>
                    <input type="text" id="modelo" wire:model="modelo" name="modelo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                    <x-input-error :messages="$errors->get('modelo')" class="mt-2" />
                </div>
                <div>
                    <label for="serie" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Serie</label>
                    <input type="text" id="serie" wire:model="serie" name="serie" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                    <x-input-error :messages="$errors->get('serie')" class="mt-2" />
                </div>
                @if (!$equipo_id)
                <div>
                    <label for="serietec" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Serie Tec</label>
                    <input type="text" id="serietec" wire:model="serietec" name="serietec" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                    <x-input-error :messages="$errors->get('serietec')" class="mt-2" />
                </div>
                @endif
                <div>
                    <label for="estado" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Estado</label>
                    <select id="estado" wire:model="estado" name="estado" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="">Selecciona un opcion</option>
                        <option value="1" @selected($estado == 1)>Operativo</option>
                        <option value="2" @selected($estado == 2)>Mantenimiento</option>
                        <option value="3" @selected($estado == 3)>Stand By</option>
                        <option value="4" @selected($estado == 4)>Malo</option>
                    </select>
                    <x-input-error :messages="$errors->get('estado')" class="mt-2" />
                </div>
                <div> 
                    <label for="observaciones" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Observaciones</label>
                    <textarea id="observaciones" wire:model="observaciones" name="observaciones" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your thoughts here..."></textarea>          
                    <x-input-error :messages="$errors->get('observaciones')" class="mt-2" />
                </div>
                <div>
                    <label for="persona_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">A cargo de:</label>
                    <select id="persona_id" wire:model="persona_id" name="persona_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="">Selecciona</option>
                    @foreach ($personas as $persona)
                        <option value="{{ $persona->id }}" @selected($persona_id == $persona->id)>{{ $persona->nombre }}</option>
                    @endforeach
                    </select>
                </div>
            </div>
            <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                {{ $marca_id? 'Actualizar':'Guardar'}}
            </button>
        </form>
    </x-modals>
    @endif

    @if ($showDeleteModal)
        <x-modal-confirm-delete>
            {{  Str::limit($equipo->descripcion, 30) }} 
        </x-modal-confirm-delete>
    @endif

    <div class="container mx-auto flex justify-between items-center py-2">
        <button type="button" wire:click="openModal" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5  dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Nuevo</button>
        
        <div class="flex gap-2 justify-end">
            <div class="relative w-96">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5v10M3 5a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm0 10a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm12 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm0 0V6a3 3 0 0 0-3-3H9m1.5-2-2 2 2 2"/>
                    </svg>
                </div>
                <input type="text" wire:model.live.debounce.1000ms="search" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search branch name..." required />
            </div>
    
            <select id="countries" wire:model.live="paginate" class="w-28 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected value="10">10 regitros</option>
                <option value="25">25 regitros</option>
                <option value="50">50 regitros</option>
                <option value="100">100 regitros</option>
            </select>
             
            <a href="{{ route('equipo.pdf') }}" class="inline-block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Generar PDF</a>
        </div>
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
                        Marca
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
                        {{ Str::limit($equipo->descripcion, 40) }}
                    </th>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $equipo->modelo }}
                    </th>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $equipo->marca->nombre }}
                    </th>
                    <th scope="row" class="px-6 py-4 font-bold text-gray-900 whitespace-nowrap dark:text-white">
                        @if ($equipo->estado == 1)
                            <p class="text-green-600">Operativo</p>
                        @endif
                        @if ($equipo->estado == 2)
                            <p class="text-yellow-600">Mantenimiento</p>
                        @endif
                        @if ($equipo->estado == 3)
                            <p class="text-blue-600">Stand-by</p>
                        @endif
                        @if ($equipo->estado == 4)
                            <p class="text-red-600">Malo</p>
                        @endif
                        
                    </th>
                    <td class="px-6 py-4 flex gap-4">
                        @can('dahsboard.equipo.show')
                        <a href="{{ route('equipo.show', $equipo->slug) }}" class="font-medium text-yellow-600 dark:text-yellow-500 hover:underline">Ver</a>
                        @endcan
                        @can('dahsboard.equipo.edit')
                        <button wire:click="edit({{$equipo->id}})" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Editar</button>
                        @endcan
                        @can('dahsboard.equipo.destroy')
                        {{-- <form action="{{ route('equipo.destroy', $equipo->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <input type="submit" value="Eliminar" class="font-medium text-red-600 dark:text-red-500 hover:underline">
                        </form> --}}
                        <button wire:click="destroy({{$equipo->id}})" class="font-medium text-red-600 dark:text-red-500 hover:underline">Eliminar</button>
                        @endcan
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $equipos->links() }}
    </div>

</div>
