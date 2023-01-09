@extends('layouts.main')

@section('title', 'UC')

@section('content')
<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1>Inserir UC</h1>
    <form action="/ucs" method="POST">
      @csrf
      <div class="form-group">
        <label for="title">Nome da Uc:</label>
        <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o nome" required>
      </div>
      <div class="form-group">
        <label for="title">Quantidade de créditos:</label>
        <input type="text" class="form-control" id="qcreditos" name="qcreditos" placeholder="digite o número de créditos" required>
      </div>
      <div class="form-group">
        <label for="title">Carga Horária:</label>
        <input type="text" class="form-control" id="carga_horaria" name="carga_horaria" placeholder="digite a carga horária" required>
      </div>
      <div class="form-group">
        <label for="title">quantidade de provas:</label>
        <input type="text" class="form-control" id="qprovas" name="qprovas" placeholder="Digite o número de provas da UC" required>
      </div>
      <input type="submit" class="btn btn-primary" value="Uc">
    </form>
  </div>
@endsection
