@extends('layouts.main')

@section('title', 'Elaborar Exame')

@section('content')
<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1>Prova</h1>
    <form action="/prova/criar" method="POST">
      @csrf
      <div class="form-group">
        <label for="title">Tipo de Prova</label>
        <select name="nome" id="name" class="form-control">
          <option value="teste">Teste</option>
          <option value="exame">Exame</option>
        </select>
      </div>
      <div class="form-group">
        <label for="title">Nome do professor:</label>
        <input type="text" class="form-control" id="id_professor" name="Nome do professor" placeholder="Nome do professor">
      </div>
      <div class="form-group">
        <label for="title">UC:</label>
        <input type="text" class="form-control" id="id_uc" name="disciplina" placeholder="Nome da disciplina">
      </div>
      <!--<div class="form-group">
        <label for="title">O evento é privado?</label>
        <select name="private" id="private" class="form-control">
          <option value="0">Não</option>
          <option value="1">Sim</option>
        </select>
      </div>-->
      <div class="form-group">
        <label for="title">Duração:</label>
        <input type="text" class="form-control" id="duracao" name="duracao" placeholder="tempo que demora o exame">
      </div>
      <div class="form-group">
        <label for="title">Valor do Exame:</label>
        <input type="text" class="form-control" id="valort" name="valort" placeholder="Pontuação total do exame">
      </div>
      <div class="form-group">
        <label for="title">Valor Mínimo:</label>
        <input type="text" class="form-control" id="valorm" name="valorm" placeholder="Pontuação mínima para aprovar na prova">
      </div>
      <div class="form-group">
        <label for="title">Quantidade de questões:</label>
        <input type="text" class="form-control" id="totalq" name="totalq" placeholder="total de questões da prova">
      </div>
     <!-- <div class="form-group">
        <label for="title">Descrição:</label>
        <textarea name="description" id="description" class="form-control" placeholder="O que vai acontecer no evento?"></textarea>
      </div>-->
      <input type="submit" class="btn btn-primary" value="Criar prova">
    </form>
  </div>
@endsection
