@extends('layouts.main')

@section('title', 'Perguntas')

@section('content')

<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1>Avaliação</h1>
    <form action="/realizar" method="POST">
      @csrf

      <div class="form-group">
        <label for="title">data da Avaliação</label>
        <select name="avaliacaos_id" id="avaliacaos_id" class="form-control">
           @foreach ($avaliar as $av)
                    <option value="{{ $av->id }}"> {{ $av->data }}</option>

           @endforeach

        </select>
      </div>
      @foreach($avaliar as $av)
      @if($av->qtidade_questoes>)
      <div class="form-group">
        <label for="title">Tipo de Questão</label>
        <select name="tipo" id="tipo" class="form-control">
          <option value="selecao">Seleção</option>
          <option value="definicao">Descrição</option>
        </select>
      </div>
      @endif
      @endforeach

      <div class="form-group">
        <label for="title">Questão:</label>
        <input type="textarea" class="form-control" id="questao" name="questao" placeholder="digite aqui a pergunta">
      </div>


      <input type="submit" class="btn btn-primary" value="Guardar">
    </form>
  </div>

@endsection
