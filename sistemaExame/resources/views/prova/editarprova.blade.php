@extends('layouts.main')

@section('title', 'Editar Prova')

@section('content')
<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1>Modelo de Avaliação</h1>
    <form action="/prova/updateprova/{{ $avaliacao->id }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="form-group">
        <label for="title">Tipo de Prova</label>
        <input type="text" class="form-control" id="tipoa" name="tipoa" value="{{ $avaliacao->tipoa }}">
      </div>

      <div class="form-group">
        <label for="title">UC</label>
        <input type="text" class="form-control" id="uc_id" name="uc_id" value="{{ $avaliacao->uc_id }}">
      </div>
      <div class="form-group">
        <label for="date">Data:</label>
        <input type="date" class="form-control" id="data" name="data" value="{{ $avaliacao->data }}">
      </div>
      <div class="form-group">
        <label for="title">Hora:</label>
        <input type="time" class="form-control" id="hora" name="hora" value="{{ $avaliacao->hora }}">
      </div>
      <div class="form-group">
        <label for="title">Duração:</label>
        <input type="text" class="form-control" id="duracao" name="duracao" value="{{ $avaliacao->duracao }}">
      </div>
      <div class="form-group">
        <label for="title">Valor do Exame:</label>
        <input type="text" class="form-control" id="pontuacao" name="pontuacao" value="{{ $avaliacao->pontuacao }}">
      </div>
      <div class="form-group">
        <label for="title">Valor Mínimo:</label>
        <input type="text" class="form-control" id="pontuacao_min" name="pontuacao_min" value="{{ $avaliacao->pontuacao_min }}">
      </div>
      <div class="form-group">
        <label for="title">Quantidade de questões:</label>
        <input type="text" class="form-control" id="qtidade_questoes" name="qtidade_questoes" value="{{ $avaliacao->qtidade_questoes }}">
      </div>

      <div class="form-group">
        <input type="hidden" class="form-control" id="prova_id" name="prova_id" value="{{ $avaliacao->prova_id }}">
      </div>
      <div class="form-group">
        <input type="hidden" class="form-control" id="users_id" name="users_id" value="{{ $avaliacao->users_id }}">
      </div>
      <input type="submit" class="btn btn-primary" value="Editar prova">
    </form>
  </div>
@endsection
