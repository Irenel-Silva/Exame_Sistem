@extends('layouts.main')

@section('title', 'Elaborar Prova')

@section('content')
    @if($errors->any())
        <ul class="errors">
            @foreach($errors->all() as $error)
                <li class="error"> {{ $error }}</li>
            @endforeach

        </ul>
    @endif
<div id="event-create-container" class="col-md-6 offset-md-3">

    <h1>Adicionar questões a avaliação</h1>
        <form name= "addqa" id="addqa" action="/prof" method="POST"
            data-avtem-url="{{ route('load_avtem') }}" data-tem-url="{{ route('load_tem') }}" data-quest-url="{{ route('load_quest') }}">
            @csrf
            <div class="form-group">
                <label for="title">UC</label>
                <select name="uc_id" id="uc_id" class="form-control">

                    <option value="">Selecione a uc</option>
                    @if(count($ucs)>0)
                        @foreach ($ucs as $uc)
                            <option value="{{ $uc->id }}"> {{ $uc->nomeu }}</option>
                        @endforeach

                @endif

                </select>
            </div>




            <div class="form-group">
                <label for="title">Data da avaliação</label>
                <select name="avaliacao_id" id="avaliacao_id" class="form-control">
                    <option value="">Selecione a data</option>

                        @foreach ($avaliar as $av)
                            <option value="{{ $av->id }}"> {{ $av->data }}</option>
                        @endforeach
                </select>
            </div>



            <div class="form-group">
                <label for="title">Tema de avaliação</label>
                <select name="tema_id" id="tema_id" class="form-control">
                    <option value="">Selecione a temática</option>
                        @foreach ($temat as $t)
                            <option value="{{ $t->id }}">{{ $t->titulo }}</option>
                        @endforeach
                </select>
            </div>



            <div class="form-group">
                <label for="title">Questão da temática</label>
                <select name="questoes_id" id="questoes_id" class="form-control">
                    <option value="">Selecione a questão</option>
                        @foreach ($quest as $que)
                            <option value="{{ $que->id }}">{{ $que->questao }}</option>
                        @endforeach

                </select>
            </div>
            <input type="submit" class="btn btn-primary" value="adicionar a prova">
            </form>


    <script type="text/javascript">
        $(document).ready(function(){
            $("#uc_id").change(function() {
                const url= $('#addqa').attr("data-avtem-url");
                ucid= $(this).val();
                $.ajax({
                    url : url,
                    data: {
                        'uc_id': ucid,
                    },
                    success: function(data){
                        $("#avaliacao_id").html(data);
                    }
                });
            });

            $("#uc_id").change(function() {
                const url= $('#addqa').attr("data-tem-url");
                ucid= $(this).val();
                $.ajax({
                    url : url,
                    data: {
                        'uc_id': ucid,
                    },
                    success: function(data){
                        $("#tema_id").html(data);
                    }
                });
            });

            $("#tema_id").change(function() {
                const url= $('#addqa').attr("data-quest-url");
                const temaid= $(this).val();
                $.ajax({
                    url : url,
                    data: {
                        'tema_id': temaid,
                    },
                    success: function(data){
                        $("#questoes_id").html(data);
                    }
                });
            });
        });
    </script>

    <script src="js/funcoes.js"></script>
  </div>
@endsection
