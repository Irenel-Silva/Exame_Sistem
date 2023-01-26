@extends('layouts.main')

@section('title', 'Visualizar provas')

@section('content')

<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Ver Avaliações</h1>
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
                        <th scope="col">Alocação</th>
                        <th scope="col">Acção</th>
                    </tr>

                </thead>

                <body>
                        @foreach($visual as $vi)
                            <?php
                                $calculo= strtotime($vi->hora) + 60*$vi->duracao;
                                $termino= strftime('%H:%M:%S', $calculo);
                            ?>
                            <tr>
                                <td scropt="row">{{$loop->index +1}}</td>
                                <td>{{ $vi->tipoa }}</td>
                                <td>{{ $vi->nomeu }}</td>
                                <td>{{ $vi->data }}</td>
                                <td>{{ $vi->duracao }}</td>
                                <?php $hojev= strtotime(date("Y-m-d")); date_default_timezone_set('Europe/Lisbon'); $tempov= time();
                                    $hoje= strftime('%Y-%m-%d', $hojev);
                                    $tempo= strftime('%H:%M:%S', $tempov);

                                ?>

                                @if($vi->data == $hoje && $tempo<= $termino )
                                    <td><a style="color: aquamarine;">Activo</a></td>
                                @else
                                    <td>Inactivo</td>
                                @endif

                                @if($vi->data == $hoje  && $tempo>= $vi->hora  && $tempo<= $termino)
                                    <td><a href="/alunos/provaaluno/{{ $vi->idav }}">Disponível</a></td>
                                @else
                                    <td><a style="color: darkred;">Indisponível</a></td>
                                @endif
                            </tr>
                        @endforeach
                </body>
            </table>

    </div>

</div>
@endsection
