@extends('layouts.main')

@section('title', 'Editando Pontuação da resposta')

@section('content')
<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1>Editando Pontuação da Questão</h1>
    <form action="/alunos/updatepr/{{ $modelo->id }}" method="POST" enctype="multipart/form-data">
      @csrf
        @method('PUT')
      <div class="form-group">
        <label for="title">ID:</label>
        <input type="text" class="form-control" id="id" name="id" placeholder=""  value="{{ $modelo->id }}">
      </div>
      <div class="form-group">
        <label for="title">ID da Avalição:</label>
        <input type="text" class="form-control" id="avaliacaos_id" name="Avaliacaos_id" placeholder="" value="{{ $modelo->avaliacaos_id }}">
      </div>
      <div class="form-group">
        <label for="title">Resposta:</label>
        <input type="text" class="form-control" id="respostam" name="respostam" placeholder="" value="{{ $modelo->respostam }}">
      </div>
      <div class="form-group">
        <label for="title">Pontuação da Questão:</label>
        <input type="text" class="form-control" id="pontuacaom" name="pontuacaom" placeholder="" value="{{ $modelo->pontuacaom }}">
      </div>
      <div class="form-group">
        <label for="title">ID do Usuario:</label>
        <input type="text" class="form-control" id="user_id" name="user_id" placeholder="" value="{{ $modelo->user_id }}">
      </div>
      <input type="submit" class="btn btn-primary" value="Editar">
    </form>
  </div>
@endsection
