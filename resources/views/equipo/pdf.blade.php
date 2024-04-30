<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta charset="viewport" content="width=device-width, initial-scale=1.0">
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
            margin-bottom: 1em;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="titulo">Reporte de Equipos</h1>
        <p class="prosa">Reporte generado por: {{ $user }}</p>
        @foreach ($equipos as $equipo)
        <table class="table">
            <tbody>
                <tr>
                    <th colspan="4">Descripcion</th>
                    <th>Fecha registro</th>
                    <td>
                        {{ $equipo->created_at }}
                    </td>
                </tr>
                <tr>
                    <td colspan="6">{{ $equipo->descripcion }}</td>
                </tr>
                <tr>
                    <th colspan="2">Marca</th>
                    <th colspan="2">Modelo</th>
                    <th colspan="2">Serie</th>
                </tr>
                <tr>
                    <td colspan="2">
                        {{ $equipo->marca->nombre }}
                    </td>
                    <td colspan="2">
                        {{ $equipo->modelo }}
                    </td>
                    <td colspan="2">
                        {{ $equipo->serie }}
                    </td>
                </tr>
                <tr>
                    <th>
                        Serie tec
                    </th>
                    <td colspan="2">
                        {{ $equipo->serietec }}
                    </td>
                    <th>
                        Estado
                    </th>
                    <td colspan="2">
                        {{ $equipo->estado }}
                    </td>
                </tr>
            </tbody>
        </table>
        @endforeach
            
            <p>Total registros:  {{ $equipos->count() }}</p>
        </div>
    </div>
</body>
</html>
    

