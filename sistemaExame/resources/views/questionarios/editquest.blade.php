@extends('layouts.main')

@section('title', 'Editar Perguntas')

@section('content')

<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1>Formulário para armazenar Questões no BD</h1>
    <form action="/questionarios/updatequest/{{ $questoes->id }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="form-group">
        <label for="title">UC</label>
        <input type="text" class="form-control" id="uc_id" name="uc_id" value=" {{ $questoes->uc_id  }} ">
      </div>
      <div class="form-group">
        <label for="title">Tema da Questão</label>
        <input type="text" class="form-control" id="tema_id" name="tema_id" value="{{ $questoes->tema_id }}">
      </div>
      <div class="form-group">
        <label for="title">Tipo de Questão</label>
        <input type="text" class="form-control" id="tipo" name="tipo" value="{{ $questoes->tipoq }}">

      </div>


      <div class="form-group">
        <label for="title">Questão:</label>
        <input type="text" class="form-control" id="questao" name="questao" value=" {{ $questoes->questao  }}">
      </div>
      <div class="form-group" id="alinha">
        <label for="title">Opção A:</label>
        <input type="text" class="form-control" id="opcao1" name="opcao1" value=" {{ $questoes->opcaoA  }}">
      </div>
      <div class="form-group" id="alinha">
        <label for="title">Opção B:</label>
        <input type="text" class="form-control" id="opcao2" name="opcao1" value=" {{ $questoes->opcaoB  }}">
      </div>
      <div class="form-group" id="alinha">
        <label for="title">Opção C:</label>
        <input type="text" class="form-control" id="opcao3" name="opcao1" value=" {{ $questoes->opcaoC  }}">
      </div>
      <div class="form-group" id="alinha">
        <label for="title">Opção D:</label>
        <input type="text" class="form-control" id="opcao4" name="opcao1" value=" {{ $questoes->opcaoD  }}">
      </div>
      <div class="form-group" id="alinha">
        <label for="title">Opção E:</label>
        <input type="text" class="form-control" id="opcao5" name="opcao1" value=" {{ $questoes->opcaoE  }}">
      </div>
      <div class="form-group" id="alinha">
        <label for="title">Opção F:</label>
        <input type="text" class="form-control" id="opcao6" name="opcao1" value=" {{ $questoes->opcaoF  }}">
      </div>


      <div class="form-group">
        <label for="title">Respota:</label>
        <input type="text" class="form-control" id="respota" name="resposta" value=" {{ $questoes->respostaq  }}">
      </div>
      <div class="form-group">
        <label for="title">Pontuação:</label>
        <input type="text" class="form-control" id="pontuacao_questao" name="pontuacao_questao" value=" {{ $questoes->pontuacao_questao  }}">
      </div>

      <input type="submit" class="btn btn-primary" value="Editar Questões">
    </form>
  </div>
@endsection
