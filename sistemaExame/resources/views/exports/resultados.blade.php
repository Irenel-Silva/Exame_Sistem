<table class="table">
    <thead>
        <tr>
            <th scope="col"># </th>
            <th scope="col">Tipo</th>
            <th scope="col">UC</th>
            <th scope="col">Nome</th>
            <th scope="col">Pontuação</th>
            <th scope="col">Status</th>
        </tr>

    </thead>

    <tbody>
            @foreach($qualificacoes as $q)
                <tr>
                        <td scropt="row">{{$loop->index +1}}</td>
                        <td>{{ $q->tipoa }}</td>
                        <td>{{ $q->nomeu }}</td>
                        <td>{{ $q->name }}</td>
                        <td>{{ $q->pontuacaototal_aluno }}</td>
                        <td>{{ $q->status }}</td>
                </tr>
            @endforeach
    </tbody>
</table>
