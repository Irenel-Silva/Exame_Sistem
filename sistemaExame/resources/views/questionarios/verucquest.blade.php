@extends('layouts.main')

@section('title', 'Ver Ucs')

@section('content')

<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Questões UC</h1>
    <br>
    <br>
    <div class="col-md-10 offset-md-1 dashboard-events-container">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col"># </th>
                        <th scope="col">Id</th>
                        <th scope="col">UC</th>
                        <th scope="col">Link</th>
                    </tr>

                </thead>

                <body>
                        @foreach($ucs as $q)
                            <tr>
                                <td scropt="row">{{$loop->index +1}}</td>
                                <td>{{ $q->id }}</td>
                                <td>{{ $q->nomeu }}</td>
                                    <td><a href="/questionarios/listaquest/{{ $q->id }}">Disponível</a></td>

                            </tr>
                        @endforeach
                </body>
            </table>

    </div>

</div>

@endsection
