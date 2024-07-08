<div>
    {{-- The Master doesn't talk, he acts. --}}
    @if ($isOpen) 
    <x-modals :title="('Editar permisos del rol')">
        <form wire:submit="store" class="p-4 md:p-5">
            <div class="grid gap-4 mb-4">
                <div>
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre</label>
                    <input type="text" name="name" wire:model="roleName" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                    @error('roleName') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="grid grid-cols-2 gap-x-2">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white col-span-2">Select Permissions</label>
                    @foreach($permisos as $permission)
                        <div>
                            <input type="checkbox" wire:model="selectedPermissions" value="{{ $permission->name }}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $permission->name }}</label>
                        </div>
                    @endforeach
                    @error('selectedPermissions') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>
            <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                {{ 'Guardar'}}
            </button>
        </form>
    </x-modals>
    @endif

    <div class="flex justify-between items-center py-2">
       
        <a href="{{ route('rol.create') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Nuevo</a>
        <button type="button" wire:click="openModal" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5  dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Nuevo</button>
       
        
        <div class="flex gap-2 justify-end">
            
    
            <select id="countries" wire:model.live="paginate" class="w-28 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected value="10">10 regitros</option>
                <option value="25">25 regitros</option>
                <option value="50">50 regitros</option>
                <option value="100">100 regitros</option>
            </select>
             
            @can('dahsboard.usuario.pdf')
            <a href="{{ route('marca.pdf') }}" class="inline-block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Generar PDF</a>
            @endcan
            
        </div>
    </div>
    
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Nombre
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $rol)
                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $rol->name }}
                    </th>
                    <td class="px-6 py-4 flex gap-4">
                        <a href="{{ route('rol.edit', $rol->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Editar permisos</a>
                        <form action="{{ route('rol.destroy', $rol->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <input type="submit" value="Eliminar" class="font-medium text-red-600 dark:text-red-500 hover:underline">
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $roles->links() }}
    </div>
</div>
