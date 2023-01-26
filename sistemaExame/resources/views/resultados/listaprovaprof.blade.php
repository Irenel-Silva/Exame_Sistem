@extends('layouts.main')

@section('title', 'Visualizar Resultados das Avaliações')

@section('content')

<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Ver Resultados</h1>
    <br>
    <br>
    <div class="col-md-10 offset-md-1 dashboard-events-container">

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col"># </th>
                        <th scope="col">Tipo</th>
                        <th scope="col">UC</th>
                        <th scope="col">Qualificação</th>
                    </tr>

                </thead>

                <body>
                        @foreach($listas as $li)
                            <tr>
                                <td scropt="row">{{$loop->index +1}}</td>
                                <td>{{ $li->tipoa }}</td>
                                <td>{{ $li->nomeu }}</td>
                                <td><a href="/resultados/addresultado/{{ $li->idav }}">ver</a></td>
                            </tr>
                        @endforeach
                </body>
            </table>

    </div>

</div>
@endsection
