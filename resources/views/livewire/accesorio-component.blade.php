<div class="p-4 mt-4">
    {{-- Stop trying to control. --}}
    <h2 class="text-xl font-bold">Accesorios del equipo</h2>
    @if ($isOpen) 
    <x-modals :title="('Formulario Accesorio')">
        <form wire:submit="store" class="p-4 md:p-5">
            <div class="grid gap-4 mb-4">
                <div> 
                    <label for="descripcion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descripcion</label>
                    <textarea id="descripcion" wire:model="descripcion" name="descripcion" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your thoughts here..."></textarea>          
                    <x-input-error :messages="$errors->get('descripcion')" class="mt-2" />
                </div>
                {{-- <div>
                    <label for="equipo_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an option</label>
                    <select id="equipo_id" wire:model="equipo_id" name="equipo_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="">Escoge un equipo</option>
                    @foreach ($equipos as $equipo)
                        <option value="{{ $equipo->id }}" @selected($equipo->id == $equipo_id)>{{ Str::limit($equipo->descripcion, 40) }} - {{ $equipo->serietec }}</option>
                    @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('equipo_id')" class="mt-2" />
                </div> --}}
                <div>
                    <label for="marca_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an option</label>
                    <select id="marca_id" wire:model="marca_id" name="marca_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="">Escoge una marca</option>
                    @foreach ($marcas as $marca)
                        <option value="{{ $marca->id }}" @selected($marca->id == $marca_id)>{{ $marca->nombre }}</option>
                    @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('marca_id')" class="mt-2" />
                </div>
                <div>
                    <label for="modelo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Modelo</label>
                    <input type="text" id="modelo" wire:model="modelo" name="modelo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"/>
                    <x-input-error :messages="$errors->get('modelo')" class="mt-2" />
                </div>
                <div>
                    <label for="serie" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Serie</label>
                    <input type="text" id="serie" wire:model="serie" name="serie" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"/>
                    <x-input-error :messages="$errors->get('serie')" class="mt-2" />
                </div>
                <div>
                    <label for="cantidad" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cantidad</label>
                    <input type="number" id="cantidad" wire:model="cantidad" name="cantidad" min="1" aria-describedby="helper-text-explanation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"/>
                    <x-input-error :messages="$errors->get('cantidad')" class="mt-2" />
                </div>
            </div>
            <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                {{ $accesorio_id? 'Actualizar':'Guardar'}}
            </button>
        </form>
    </x-modals>
    @endif

    @if ($showDeleteModal)
        <x-modal-confirm-delete>
            {{ $accesorio->descripcion }}
        </x-modal-confirm-delete>
    @endif

    <div class="container mx-auto flex justify-between items-center py-2">
        <button type="button" wire:click="openModal" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5  dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Nuevo</button>
        
        {{-- <div class="flex gap-2 justify-end">
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
             
            <a href="{{ route('marca.pdf') }}" class="inline-block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Generar PDF</a>
        </div> --}}
    </div>
        @if (count($accesorios))
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Descripcion
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Marca
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Modelo
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Serie
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Cantidad
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Acciones
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($accesorios as $accesorio)
                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ Str::limit($accesorio->descripcion, 40) }}
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $accesorio->marca? $accesorio->marca->nombre:'sin marca'  }}
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $accesorio->modelo }}
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $accesorio->serie }}
                        </td>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $accesorio->cantidad }}
                        </td>
                        <td class="px-6 py-4 flex gap-4">
                            <button wire:click="edit({{$accesorio->id}})" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Editar</button>
                            <button wire:click="destroy({{$accesorio->id}})" class="font-medium text-red-600 dark:text-red-500 hover:underline">Eliminar</button>
                            {{-- <a href="{{ route('accesorio.edit', ['accesorio'=>$accesorio->id, 'equipo'=>$equipo->slug]) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Editar</a>
                            <form action="{{ route('accesorio.destroy', $accesorio->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <input type="hidden" name="slug" value="{{ $equipo->slug }}">
                                <input type="submit" value="Eliminar" class="font-medium text-red-600 dark:text-red-500 hover:underline">
                            </form> --}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table> 
            @else
                <p class="p-4">Vaya al parecer el equipo no tiene accesorios</p>
            @endif
        </div>
</div>
