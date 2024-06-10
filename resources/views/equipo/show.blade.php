<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-gray-800 leading-tight">
            {{ __('equipo > show') }}
        </h2>
    </x-slot>

    
    <div class="container mx-auto">
        
        <div class="grid grid-cols-3 bg-white p-2 m-2 rounded-md">
            <div class="col-span-2 p-4">
                <h2 class="text-xl font-bold">Informacion del equipo</h2>
                <span class="font-bold">Descripcion</span>
                <p class="mb-2">{{ $equipo->descripcion }}</p>
                <div class="grid grid-cols-3 mb-2">
                    <p><span class="font-bold">Marca: </span>{{ $equipo->marca->nombre }}</p>
                    <p><span class="font-bold">Modelo: </span>{{ $equipo->modelo }}</p>
                    <p><span class="font-bold">Serie: </span>{{ $equipo->serie }}</p>
                </div>
                <p><span class="font-bold">Serietec: </span>{{ $equipo->serietec }}</p>
                <span class="font-bold">Observaciones</span>
                <p>{{ $equipo->observaciones }}</p>
                <div class="grid grid-cols-3 mb-2">
                    <p><span class="font-bold">A cargo de: </span>{{ $equipo->persona?$equipo->persona->nombre:'admin' }}</p>
                    <p><span class="font-bold">fecha creacion: </span>{{ date('d-M-Y', strtotime($equipo->created_at)) }}</p>
                    <p><span class="font-bold">fecha actualización: </span>{{ date('d-M-Y', strtotime($equipo->updated_at)) }}</p>
                </div>
               
                <p><span class="font-bold">Cantidad de accesorios: </span>{{ count($accesorios) }}</p>
                <p><span class="font-bold">Cantidad de acciones: </span>{{ count($acciones) }}</p>
                
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
                    <span class="border-2 border-red-600 text-red-600 p-1 px-5 font-bold text-center rounded-md">Malo</span>
                @endif
                
                {{-- <div class="flex gap-2">
                    <a href="{{ route('accesorio.create', $equipo->slug) }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Agregar Accesorio</a>
                    <a href="{{ route('accion.create', $equipo->slug) }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Agregar Accion</a>
                    <a href="{{ route('equipo.pdf', $equipo->slug) }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Generar Reporte</a>
                </div> --}}
            </div>
            <div class=" p-4 justify-center">
                <h2 class="text-xl font-bold text-center">QR del equipo</h2>
                <div id="contenedorQR" class="flex justify-center p-4">{!! $qrcode !!}</div>
                <button id="descargarQR" class="inline-block mx-auto text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Descargar QR</button>
            </div>
        </div>
        
        <div class="container mx-auto">
            @livewire('accesorio-component', ['equipo' => $equipo])
            @livewire('accion-component', ['equipo' => $equipo])
        </div>
      
        {{-- <div class="col-span-2 relative overflow-x-auto shadow-md sm:rounded-lg">
            <h2 class="text-xl">Accesorios del equipo</h2>
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
                            {{ $accesorio->marca->nombre }}
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $accesorio->modelo }}
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $accesorio->serie }}
                        </td>
                        <td class="px-6 py-4 flex gap-4">
                            <a href="{{ route('accesorio.edit', ['accesorio'=>$accesorio->id, 'equipo'=>$equipo->slug]) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Editar</a>
                            <form action="{{ route('accesorio.destroy', $accesorio->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <input type="hidden" name="slug" value="{{ $equipo->slug }}">
                                <input type="submit" value="Eliminar" class="font-medium text-red-600 dark:text-red-500 hover:underline">
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table> 
            @else
                <p class="p-4">Vaya al parecer el equipo no tiene accesorios</p>
            @endif
        </div> --}}

        {{-- <div class="col-span-2 relative overflow-x-auto shadow-md sm:rounded-lg">
            <h2 class="text-xl">Acciones del equipo</h2>
            @if (count($acciones))
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Descripcion
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Estado
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Usuario
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Acciones
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($acciones as $accion)
                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ Str::limit($accion->descripcion, 50) }}
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $accion->estado }}
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $accion->usuarios->name }}
                        </th>
                        <td class="px-6 py-4 flex gap-4">
                            <a href="{{ route('accion.edit', ['accion'=>$accion->id, 'equipo'=>$equipo->slug]) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Editar</a>
                            <form action="{{ route('accion.destroy', $accion->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <input type="hidden" name="slug" value="{{ $equipo->slug }}">
                                <input type="submit" value="Eliminar" class="font-medium text-red-600 dark:text-red-500 hover:underline">
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table> 
            @else
                <p class="p-4">Vaya al parecer el equipo no tiene acciones</p>
            @endif
        </div> --}}
    </div>

    <script>
        function mostrarQR() {
            var contenedorQR = document.getElementById("contenedorQR");
            var textoQR = document.getElementById("qrslug").innerHTML; // El texto que quieres codificar en el QR

            // Crea el código QR
            var qrCode = new QRCode(contenedorQR, {
                text: textoQR,
                width: 256,
                height: 256,
            });
            
        }

        // Llama a la función para mostrar el QR cuando la página se carga
        //window.onload = mostrarQR;

        function descargarQR() {
            var contenedorQR = document.getElementById("contenedorQR");

            // Convierte el código QR en una imagen
            var qrImagen = contenedorQR.querySelector('img');

            // Crea un enlace temporal para descargar la imagen
            var enlaceDescarga = document.createElement('a');
            enlaceDescarga.href = qrImagen.src;
            enlaceDescarga.download = 'codigoQR.jpg'; // Nombre del archivo a descargar
            document.body.appendChild(enlaceDescarga);
            enlaceDescarga.click();
            document.body.removeChild(enlaceDescarga);
        }

        // Evento click del botón para generar y descargar el QR
        document.getElementById("descargarQR").addEventListener("click", descargarQR);
    </script>
</x-app-layout>

    