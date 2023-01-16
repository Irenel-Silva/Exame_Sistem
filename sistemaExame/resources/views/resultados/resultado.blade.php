@extends('layouts.main')

@section('title', 'Listar Resultados dos Alunos')

@section('content')

<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Resultados</h1>

    <table class="table" style="border: 0cm">
        <thead>

        </thead>
        <tbody>
            <tr>
                <th rowspan="3" style="border: 0cm"><h5 style="color: rgb(14, 151, 248)">Exportar</h5></th>
            </tr>
            <tr>
                <th style="border: 0cm"><a href="/resultados/export/{{ $prova_id }}">Excel</th>

                    <th style="border: 0cm"><a href="/resultados/exportcsv/{{ $prova_id }}">CSV</th>


                    <th style="border: 0cm"><a href="/resultados/exportpdf/{{ $prova_id }}">PDF</th>
            </tr>
        </tbody>
    </table>

    <br>
    <br>
    <div class="col-md-10 offset-md-1 dashboard-events-container">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col"># </th>
                        <th scope="col">Tipo</th>
                        <th scope="col">UC</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Pontuação</th>
                        <th scope="col">Status</th>
                        <th scope="col">CRUD</th>
                    </tr>

                </thead>

                <body>
                        @foreach($qualificacoes as $q)
                            <tr>
                                    <td scropt="row">{{$loop->index +1}}</td>
                                    <td>{{ $q->tipoa }}</td>
                                    <td>{{ $q->nomeu }}</td>
                                    <td>{{ $q->name }}</td>

                                    @if ($q->pontuacaototal_aluno < $q->pontuacao_min)
                                    <td><a style="color: darkred">{{ $q->pontuacaototal_aluno }}</a></td>
                                    @else
                                    <td><a style="color:aquamarine">{{ $q->pontuacaototal_aluno }}</a></td>
                                    @endif
                                    <td>{{ $q->status }}</td>
                                    <td>
                                        <form action="/resultados/{{ $q->idresultado }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger delete-btn"><ion-icon name="trash-outline"></ion-icon>Deletar</button>
                                        </form>
                                    </td>
                            </tr>
                        @endforeach
                </body>
            </table>

    </div>

</div>

@endsection
