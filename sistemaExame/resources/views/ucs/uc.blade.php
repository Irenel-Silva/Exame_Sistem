@extends('layouts.main')

@section('title', 'UC')

@section('content')
    @if($errors->any())
        <ul class="errors">
            @foreach($errors->all() as $error)
                <li class="error"> {{ $error }}</li>
            @endforeach

        </ul>
    @endif
<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1>Inserir UC</h1>
    <form action="/ucs" method="POST">
      @csrf
      <div class="form-group">
        <label for="title">Nome da Uc:</label>
        <input type="text" class="form-control" id="nomeu" name="nomeu" placeholder="Digite o nome">
      </div>
      <div class="form-group">
        <label for="title">Quantidade de créditos:</label>
        <input type="text" class="form-control" id="qcreditos" name="qcreditos" placeholder="digite o número de créditos">
      </div>
      <div class="form-group">
        <label for="title">Carga Horária:</label>
        <input type="text" class="form-control" id="carga_horaria" name="carga_horaria" placeholder="digite a carga horária">
      </div>
      <div class="form-group">
        <label for="title">quantidade de provas:</label>
        <input type="text" class="form-control" id="qprovas" name="qprovas" placeholder="Digite o número de provas da UC">
      </div>
      <input type="submit" class="btn btn-primary" value="Uc">
    </form>
  </div>
@endsection
