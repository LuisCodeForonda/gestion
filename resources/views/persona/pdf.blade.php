<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Persona</title>
    <style>
        .container{
            max-width: 1200px;
            margin: 0 auto;
            font-size: 1.1em;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .titulo{
            text-align: center;
            font-size: 2em;
            font-weight: bold;
        }
        th, td {
            border: 1px solid;
            
        }
        table{
            width: 100%;
            border: 1px solid;
            border-collapse: collapse;
        }
        .head > th{
            padding: 5px 0;
        }
        .body > th{
            font-weight: initial;
            padding: 5px 0;
        }
        
    </style>
</head>
<body>
    <div class="container">
        <h1 class="titulo">Reporte de personas</h1>
        <p class="prosa">Reporte generado por: {{ $user }}</p>
        <div class="">
            <table class="table">
                <thead class="">
                    <tr class="head">
                        <th scope="col" class="px-6 py-3">
                            Nombre
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Cargo
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Carnet
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Creado
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($personas as $persona)
                    <tr class="body">
                        <th scope="" class="">
                            {{ $persona->nombre }}
                        </th>
                        <th scope="" class="">
                            {{ $persona->cargo }}
                        </th>
                        <th scope="" class="">
                            {{ $persona->carnet }}
                        </th>
                        <th scope="" class="">
                            {{ date('d-m-Y', strtotime($persona->created_at)) }}
                        </th>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <p>Total registros:  {{ $personas->count() }}</p>
        </div>
    </div>
</body>
</html>
    


    