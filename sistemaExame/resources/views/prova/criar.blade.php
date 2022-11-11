@extends('layouts.main')

@section('title', 'Elaborar Exame')

@section('content')
<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1>Prova</h1>
    <form action="/prova" method="POST">
      @csrf
      <div class="form-group">
        <label for="title">Tipo de Prova</label>
        <select name="tipo" id="tipo" class="form-control">
          <option value="teste">Teste</option>
          <option value="exame">Exame</option>
        </select>
      </div>

      <div class="form-group">
        <label for="title">UC</label>
        <select name="uc_id" id="uc_id" class="form-control">
           @foreach ($ucs as $uc)
                    <option value="{{ $uc->id }}"> {{ $uc->id }} {{ $uc->nome }}</option>

           @endforeach

        </select>
      </div>
      <div class="form-group">
        <label for="date">Data:</label>
        <input type="date" class="form-control" id="data" name="data">
      </div>
      <div class="form-group">
        <label for="title">Duração:</label>
        <input type="text" class="form-control" id="duracao" name="duracao" placeholder="tempo que demora o exame">
      </div>
      <div class="form-group">
        <label for="title">Valor do Exame:</label>
        <input type="text" class="form-control" id="pontuacao" name="pontuacao" placeholder="Pontuação total do exame">
      </div>
      <div class="form-group">
        <label for="title">Valor Mínimo:</label>
        <input type="text" class="form-control" id="pontuacao_min" name="pontuacao_min" placeholder="Pontuação mínima para aprovar na prova">
      </div>
      <div class="form-group">
        <label for="title">Quantidade de questões:</label>
        <input type="text" class="form-control" id="qtidade_questoes" name="qtidade_questoes" placeholder="total de questões da prova">
      </div>
      <input type="submit" class="btn btn-primary" value="Criar prova">
    </form>
  </div>
@endsection
