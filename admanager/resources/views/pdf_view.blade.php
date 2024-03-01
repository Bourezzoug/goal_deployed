<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel 7 PDF Example</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
</head>
<body>
    <div>
            <h2 class="text-center mb-3">Statistique de :{{ $banniere['titre'] }}</h2>
            <img src="{{ public_path($banniere['image']) }}" style="width:706px" alt="">
            <table class="table table-bordered mb-5">
                <thead>
                    <tr class="table-danger">
                        <th scope="col">Nom de la campagne</th>
                        <th scope="col">Position</th>
                        <th scope="col">Plannification</th>
                        <th scope="col">Cliques Totales</th>
                        <th scope="col">Cliques unique</th>
                        <th scope="col">Vues Totales</th>
                        <th scope="col">Vues unique</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $banniere->campagne->Libelle}}</td>
                        <td>{{ $banniere['position'] }}</td>
                        <td>
                            @php
                            $plannifications = explode(',', $banniere['plannification']);
                        @endphp
@if(count($plannifications) > 0)
    <div>
        {{ __('De ') }}{{ date('d/m/Y', strtotime(trim($plannifications[0]))) }}
        {{ __(' à ') }}
        {{ date('d/m/Y', strtotime(trim($plannifications[count($plannifications)-1]))) }}
    </div>
@endif

                        </td>
                        <td>{{ $banniere['nb_total_click'] }}</td>
                        <td>{{ $banniere['nb_unique_click'] }}</td>
                        <td>{{ $banniere['nb_total_vues'] }}</td>
                        <td>{{ $banniere['nb_unique_vues'] }}</td>
                    </tr>
                </tbody>
            </table>
    </div>
    {{-- <script src="{{ asset('js/app.js') }}" type="text/js"></script> --}}
</body>
</html>
