@extends('layouts.main')

@section('title', 'visualizar prova')

@section('content')

<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Avaliações</h1>
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
                        <th scope="col">Duração</th>
                        <th scope="col">Status</th>
                        <th scope="col">Atribuir resultado</th>
                        <th scope="col">Visualizar Avaliação</th>
                        <th scope="col">CRUD Avaliação</th>
                        <th scope="col">Visualizar Resultados</th>
                    </tr>

                </thead>

                <body>
                        @foreach($quest as $q)
                            <tr>
                                <td scropt="row">{{$loop->index +1}}</td>
                                <td>{{ $q->tipoa }}</td>
                                <td>{{ $q->nomeu }}</td>
                                <td>{{ $q->data }}</td>
                                <td>{{ $q->duracao }}</td>
                                <?php $hoje= strtotime(date("Y-m-d")); ?>

                                @if($q->data >= $hoje )
                                    <td><a style="color: aquamarine;">Por fazer</a></td>
                                    <td><a href="/resultados/addresultado/{{ $q->idav }}">Disponível</a></td>
                                @else
                                    <td><a style="color:darkred;">Feito </a></td>
                                    <td><a style="color: darkred;"> Indisponível</a></td>
                                @endif
                                <td><a href="/alunos/provaaluno/{{ $q->idav }}">link</a></td>


                                <td>
                                    <a href="/prova/editarprova/{{ $q->idav }}" class="btn btn-info edit-btn"><ion-icon name="create-outline"></ion-icon>Editar</a>
                                </td>

                                <td>

                                    <a href="/resultados/resultado/{{ $q->idav }}">Qualificação</a>
                                    
                                </td>
                            </tr>
                        @endforeach
                </body>
            </table>

    </div>

</div>
<?php
    if (isset($_POST['acao'])) {
         // formulário foi enviado
        $arquivo= $_Files['file'];
        $arquivon= explode('.', $arquivo['name']);
        if ($arquivon[sizeof($arquivon)-1]!= 'jpg') {
                die('Você não pode fazer upload deste tipo de arquivo');
        }else {
            echo 'Upload feito com sucesso!';
            move_uploaded_file($arquivo['tmp_name'], 'uploads/'.$arquivo['name']);
        }
    }
?>

@endsection
