@extends('layouts.main')

@section('title', 'Atribuir Resultados')

@section('content')

<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Avaliações</h1>
    <br>

        <form action="/resultados" method="POST">
            @csrf
            <input type="hidden" id="prova_id" name="prova_id" value="{{ $provado }}">
            <input type="submit" class="btn btn-primary" value="Salvar">
        </form>
        <br>
        <br>

        <?php $cont=0; ?>
        @foreach($qualificacoes as $q)
            @if($cont==0)
                <a href="/resultados/resultado/{{ $q->idav }}">Qualificação</a>
            @endif
            <?php $cont++;?>
        @endforeach
    <br>
    <br>
    <div class="col-md-10 offset-md-1 dashboard-events-container">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col"># </th>
                        <th scope="col">Tipo</th>
                        <th scope="col">UC</th>
                        <th scope="col">Tipo da Questão</th>
                        <th scope="col">Questão</th>
                        <th scope="col">Resposta</th>
                        <th scope="col">Pontuação</th>
                        <th>Crud</th>
                    </tr>

                </thead>

                <body>
                    <?php $contagem=0;?>
                        @foreach($qualificacoes as $q)

                            <tr>
                                @if($q->tipoq=="definicao")
                                    <?php $contagem++ ;?>
                                    @if ($contagem%$q->qtidade_questoes==0)

                                        <td scropt="row">{{$loop->index +1}}</td>
                                        <td>{{ $q->tipoa }}</td>
                                        <td>{{ $q->nomeu }}</td>
                                        <td>{{ $q->tipoq }}</td>
                                        <td>{{ $q->questao }}</td>
                                        <td>{{ $q->respostam }}</td>
                                        @if ($q->pontuacaom == 0)
                                        <td><a style="color: darkred">{{ $q->pontuacaom }}</a></td>
                                        @else
                                        <td><a style="color:aquamarine">{{ $q->pontuacaom }}</a></td>
                                        @endif
                                        <td>
                                            <a href="/alunos/editpontoresposta/{{ $q->idmo }}" class="btn btn-info edit-btn"><ion-icon name="create-outline"></ion-icon>Editar</a>
                                            <!--<form action="/alunos/" method="POST">

                                                <button type="submit" class="btn btn-danger delete-btn"><ion-icon name="trash-outline"></ion-icon>Deletar</button>
                                            </form>-->

                                        </td>
                                    @endif
                                @endif
                            </tr>

                        @endforeach
                </body>
            </table>

    </div>

</div>

@endsection
