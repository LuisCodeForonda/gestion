<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Marca</title>
    
    <style>
        th, td {
            border: 1px solid;
        }
        table{
            width: 100%;
            border: 1px solid;
            border-collapse: collapse;
        }
        .head > th{
            padding: 0.5em 0;
        }
        .body > th, .body > td{
            font-weight: initial;
            padding: 0.2em 0.6em;
        }
    </style>
</head>
<body>
    <div style="">
        <h2>Reporte de Equipo</h2>
        <div>
            <p><strong>Reporte generado por:</strong> {{ $user }}</p>
            <p><strong>Codigo de equipo:</strong> {{ $equipo->serietec }}</p>
        </div>
        
        <hr>
        <div style="">
            <div>
                <h3>Descripcion</h3>
                <p class="descripcion">{{ $equipo->descripcion }}</p>
                <table class="table">
                    <tbody>
                        <tr class="body">
                            <th scope="" class="" colspan="2">
                                <strong>Detalle</strong>
                            </th>
                        </tr>
                        <tr class="body">
                            <th scope="" class="">
                                <strong>Marca</strong>
                            </th>
                            <td>
                                {{ $equipo->marca->nombre }}
                            </td>
                        </tr>
                        <tr class="body">
                            <th scope="" class="">
                                <strong>Modelo</strong>
                            </th>
                            <td>
                                {{ $equipo->modelo }}
                            </td>
                        </tr>
                        <tr class="body">
                            <th scope="" class="">
                                <strong>Serie</strong>
                            </th>
                            <td>
                                {{ $equipo->serie }}
                            </td>
                        </tr>
                        <tr class="body">
                            <th scope="" class="">
                                <strong>Codigo</strong>
                            </th>
                            <td>
                                {{ $equipo->serietec }}
                            </td>
                        </tr>
                        <tr class="body">
                            <th scope="" class="">
                                <strong>Fecha creacion</strong>
                            </th>
                            <td>
                                {{ $equipo->created_at }}
                            </td>
                        </tr>
                        <tr class="body">
                            <th scope="" class="">
                                <strong>Fecha actualizacion</strong>
                            </th>
                            <td>
                                {{ $equipo->created_at }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div style="margin: 0 auto;">
                <h3>Codigo QR</h3>
                <img style="display: inline;" src="data:image/png;base64, {{ base64_encode(QrCode::size(200)->generate('https://admin.ctvbolivia.com/dashboard/equipo/'.$equipo->slug)) }} " >
            </div> 
        </div>
        <div style="">
            <h3 style="padding-bottom: 1em">Accesorios del equipo</h3>
            @foreach ($accesorios as $accesorio)
            <table style="margin-bottom: 1em;">
                <tbody style="">
                    <tr style="font-weight: initial">
                        <th scope="" style="" colspan="4">
                            Descripcion
                        </th>
                    </tr>
                    <tr>
                        <td colspan="4">{{ $accesorio->descripcion }}</td>
                    </tr>
                    <tr>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Serie</th>
                        <th>Cantidad</th>
                    </tr>
                    <tr>
                        <td>{{ $accesorio->marca->nombre }}</td>
                        <td>{{ $accesorio->modelo }}</td>
                        <td>{{ $accesorio->serie }}</td>
                        <td>{{ $accesorio->cantidad }}</td>
                    </tr>
                </tbody>
            </table>
            @endforeach
        </div>

        <div style="">
            <h3 style="padding-bottom: 1em">Acciones del equipo</h3>
            @foreach ($acciones as $accion)
                <table style="margin-bottom: 1em;">
                    <tbody>
                    <tr style="font-weight: initial">
                        <th scope="" colspan="3">
                            Descripcion
                        </th>
                    </tr>
                    <tr>
                        <td colspan="3">{{ $accion->descripcion }}</td>
                    </tr>
                    <tr>
                        <th>Usuario</th>
                        <th>Estado</th>
                        <th>Fecha creación</th>
                    </tr>
                    <tr>
                        <td>{{ $accion->usuarios->name }}</td>
                        <td>
                            @if ($accion->estado == 1)
                            Operativo
                            @endif
                            @if ($accion->estado == 2)
                                    Mantenimiento
                            @endif
                            @if ($accion->estado == 3)
                                    Stand By
                            @endif
                            @if ($accion->estado == 4)
                                    Malo
                            @endif
                        </td>
                        <td>{{ $accion->created_at}}</td>
                    </tr>
                </tbody>
            </table>
            @endforeach 
        </div>

    </div>
</body>
</html>
    
