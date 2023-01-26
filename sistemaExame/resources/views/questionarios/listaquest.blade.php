@extends('layouts.main')

@section('title', 'Lista Questões')

@section('content')

<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Lista Questões</h1>
    <br>
    <br>
    <div class="col-md-10 offset-md-1 dashboard-events-container">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col"># </th>
                        <th scope="col">Id</th>
                        <th scope="col">Questão</th>
                        <th scope="col">Resposta</th>
                        <th scope="col">link</th>
                    </tr>

                </thead>

                <body>
                        @foreach($qualificacaos as $q)
                            <tr>
                                <td scropt="row">{{$loop->index +1}}</td>
                                <td>{{ $q->qid }}</td>
                                <td>{{ $q->questao }}</td>
                                <td>{{ $q->respostaq }}</td>
                                <td><a href="/questionarios/editquest/{{ $q->qid }}" class="btn btn-info edit-btn"><ion-icon name="create-outline"></ion-icon>Editar</a></td>
                            </tr>
                        @endforeach
                </body>
            </table>

    </div>

</div>

@endsection
