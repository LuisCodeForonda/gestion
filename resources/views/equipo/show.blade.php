<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-gray-800 leading-tight">
            {{ __('equipo > show') }}
        </h2>
    </x-slot>

    
    <div class="container mx-auto grid grid-cols-2 gap-4">
        
        <div class="">
            <h2 class="text-xl">Informacion del equipo</h2>
            <span class="font-bold">Descripcion</span>
            <p>{{ $equipo->descripcion }}</p>
            <p><span class="font-bold">Marca: </span>{{ $equipo->marca->nombre }}</p>
            <p><span class="font-bold">Modelo: </span>{{ $equipo->modelo }}</p>
            <p><span class="font-bold">Serie: </span>{{ $equipo->serie }}</p>
            <p><span class="font-bold">Serietec: </span>{{ $equipo->serietec }}</p>
            <p><span class="font-bold">fecha: </span>{{ $equipo->created_at }}</p>
        </div>
        <div class="flex flex-col items-center">
            <h2 class="text-xl">QR del equipo</h2>
            <p id="qrslug" class="hidden">{{ 'https://admin.ctvbolivia.com/dashboard/equipo/'.$equipo->slug }}</p>
            <div id="contenedorQR" class="flex justify-center p-4"></div>
            <button id="descargarQR" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Descargar QR</button>
        </div>
        <div class="">
            <h2 class="text-xl">Accesorios del equipo</h2>
            <ul>
                @foreach ($accesorios as $accesorio)
                    <li>{{ $accesorio->descripcion }} - {{ $accesorio->cantidad }}</li>
                @endforeach
            </ul>
        </div>
        <div class="">
            <h2 class="text-xl">Acciones del equipo</h2>
            <ul>
                @foreach ($acciones as $accion)
                    <li>{{ $accion->descripcion }} - {{ $accion->created_at }}</li>
                @endforeach
            </ul>
        </div>
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
        window.onload = mostrarQR;

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

    