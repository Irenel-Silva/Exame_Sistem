@extends('layouts.main')

@section('title', 'Perguntas')

@section('content')
    @if($errors->any())
        <ul class="errors">
            @foreach($errors->all() as $error)
                <li class="error"> {{ $error }}</li>
            @endforeach

        </ul>
    @endif

<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1>Questões</h1>
    <form action="/questionarios" method="POST">
      @csrf

      <div class="form-group">
        <label for="title">UC</label>
        <select name="uc_id" id="uc_id" class="form-control">
           <option value="">Selecione a uc</option>
           @foreach ($ucs as $uc)
                    <option value="{{ $uc->id }}"> {{ $uc->nomeu }}</option>

           @endforeach

        </select>
      </div>
      <div class="form-group">
        <label for="title">Tema da Questão</label>
        <select name="tema_id" id="tema_id" class="form-control">
            <option value="">Selecione o tema</option>
            @foreach ($tema as $t)
                <option value="{{ $t->id }}">{{ $t->titulo }}</option>
            @endforeach
         </select>
      </div>
      <div class="form-group">
        <label for="title">Tipo de Questão</label>
        <select name="tipoq" id="tipoq" class="form-control">
            <option value="">Selecione o tipo de questao</option>
          <option value="selecao">Seleção</option>
          <option value="definicao">Definição</option>
        </select>
      </div>


      <div class="form-group">
        <label for="title">Questão:</label>
        <input type="textarea" class="form-control" id="questao" name="questao" placeholder="digite aqui a pergunta">
      </div>
      <div class="form-group" id="alinha">
        <label for="title">Opção:</label>
        <input type="text" class="form-control" id="opcao1" name="opcao1" placeholder="digite o corresponde a opção">
        <button type="button" class="btn btn-add"> + </button>
      </div>


      <div class="form-group">
        <label for="title">Respota:</label>
        <input type="text" class="form-control" id="resposta" name="resposta" placeholder="digite a resposta da questão">
      </div>
      <div class="form-group">
        <label for="title">Pontuação:</label>
        <input type="text" class="form-control" id="pontuacao_questao" name="pontuacao_questao" placeholder="digite a pontuação da questão">
      </div>

      <input type="submit" class="btn btn-primary" value="Guardar">
    </form>
  </div>
    <script>
        $(document).ready(function(){
            var controlcampo= 1;
            $(".btn-add").click(function(){
                controlcampo++;

                document.getElementById('alinha').insertAdjacentHTML('beforeend', '<div class="form-group1" id="opcao' +controlcampo + '" >    <label for="title"> Opção' +controlcampo +':</label><input type="text" class="form-control" id="opcao' + controlcampo+ '" name="opcao' + controlcampo+ '" placeholder="digite o corresponde a opção"/>  <button type="button" id="' + controlcampo + '" class="btn btn-remove"  > - </button></div>');
            });
            $("body").on("click", ".btn-remove", function(){
                $(this).parents(".form-group1").remove();
                controlcampo--;
            });
        });

    </script>
@endsection
