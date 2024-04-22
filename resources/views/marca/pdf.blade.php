<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Marca</title>
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
        <h1 class="titulo">Reporte de marcas</h1>
        <p class="prosa">Reporte generado por: {{ $user }}</p>
        <div class="">
            <table class="table">
                <thead class="">
                    <tr class="head">
                        <th scope="" class="">
                            Item
                        </th>
                        <th scope="" class="">
                            Nombre
                        </th>
                        <th scope="" class="">
                            Fecha 
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($marcas as $marca)
                    <tr class="body">
                        <th scope="" class="">
                            {{ $loop->index + 1 }}
                        </th>
                        <th scope="" class="">
                            {{ $marca->nombre }}
                        </th>
                        <th scope="" class="">
                            {{ date('d-m-Y', strtotime($marca->created_at)) }}
                        </th>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <p>Total registros:  {{ $marcas->count() }}</p>
        </div>
    </div>
</body>
</html>
    


    