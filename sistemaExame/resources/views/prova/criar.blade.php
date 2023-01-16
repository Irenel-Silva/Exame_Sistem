@extends('layouts.main')

@section('title', 'Modelar Prova')

@section('content')
    @if($errors->any())
        <ul class="errors">
            @foreach($errors->all() as $error)
                <li class="error"> {{ $error }}</li>
            @endforeach

        </ul>
    @endif
<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1>Modelo de Avaliação</h1>
    <form action="/prova" method="POST">
      @csrf
      <div class="form-group">
        <label for="title">Tipo de Prova</label>
        <select name="tipoa" id="tipoa" class="form-control">
            <option value=""> Selecione o Modelo de Avaliação</option>
          <option value="teste">Teste</option>
          <option value="exame">Exame</option>
        </select>
      </div>

      <div class="form-group">
        <label for="title">UC</label>
        <select name="uc_id" id="uc_id" class="form-control">
            <option value="">Selecione a UC</option>
            @if(count($ucs)>0)
                @foreach ($ucs as $uc)
                    <option value="{{ $uc->id }}">{{ $uc->nomeu }}</option>

                @endforeach
           @endif

        </select>
      </div>
      <div class="form-group">
        <label for="date">Data:</label>
        <input type="date" class="form-control" id="data" name="data">
      </div>
      <div class="form-group">
        <label for="title">Hora:</label>
        <input type="time" class="form-control" id="hora" name="hora" placeholder="">
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
