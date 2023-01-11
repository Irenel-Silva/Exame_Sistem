@extends('layouts.main')

@section('title', 'Qualificações')

@section('content')

<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Qualificações</h1>
    <br>
    <br>
    <div class="col-md-10 offset-md-1 dashboard-events-container">

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col"># </th>
                        <th scope="col">Tipo</th>
                        <th scope="col">UC</th>
                        <th scope="col">Data</th>
                        <th scope="col">Resultado</th>
                        <th scope="col">Status</th>
                    </tr>

                </thead>

                <body>
                        @foreach($notas as $nota)
                            <tr>
                                <td scropt="row">{{$loop->index +1}}</td>
                                <td>{{ $nota->tipoa }}</td>
                                <td>{{ $nota->nomeu }}</td>
                                <td>{{ $nota->data }}</td>
                                <td>{{ $nota->pontuacaototal_aluno }}</td>
                                <td>{{ $nota->status }}</td>
                            </tr>
                        @endforeach
                </body>
            </table>

    </div>

</div>
@endsection
