@extends('layouts.main')

@section('title', 'prova Aluno')

@section('content')

<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1>Prova</h1>
    <p style="color:black;">
        <?php  $cont=0;$resultexa=0; $existe='nao' ?>
        @foreach($modelos as $mo)
            @if(auth()->user()->id == $mo->user_id)
                <?php $existe='sim' ?>
            @endif
        @endforeach

    @if($existe=='sim')
        <label><h4> Aluno <?php echo auth()->user()->name ?> já tem a Prova feita </h4></label>
    @else
        @foreach ($prova as $pro)
            @while ($cont==0)
                <h4 class="text-left">{{ $pro->nomeu }}</h4><br>
                <h4 class="text-left">{{$pro->data}}</h4><br>
                <h4 class="text-left">{{$pro->duracao}}</h4><br>
                <?php $cont++?>
           @endwhile
        @endforeach
        </p>
        <br>
        <br>
        <form action="/alunos" method="POST">
         @csrf
         <div class="form-group">
            <input type="hidden" id="prova_id" name="prova_id" value="{{ $provado }}">
            @foreach ($prova as $pro)
                @if($pro->idav==$provado)
                    <h3><label for="title">Q{{ $loop->index +1 }}. {{ $pro->questao }}</label></h3><br>
                    @if($pro->tipoq!="definicao")
                        <h5><input type="checkbox"  id="resposta[]" name="resposta[]" value="{{ $pro->opcaoA }}"> a). {{ $pro->opcaoA }}</h4><br>
                        <h5><input type="checkbox"  id="resposta[]" name="resposta[]" value="{{ $pro->opcaoB }}"> b). {{ $pro->opcaoB }}</h5><br>
                        <h5><input type="checkbox"  id="resposta[]" name="resposta[]" value="{{ $pro->opcaoC }}"> c). {{ $pro->opcaoC }}</h5><br>
                        @if ($pro->opcaoD != "")
                        <h5><input type="checkbox"  id="resposta[]" name="resposta[]" value="{{ $pro->opcaoD }}"> d). {{ $pro->opcaoD }}</h5><br>
                        @endif
                        @if ($pro->opcaoE != "")
                            <h5><input type="checkbox"  id="resposta[]" name="resposta[]" value="{{ $pro->opcaoE }}"> e). {{ $pro->opcaoE }}</h5><br>
                        @endif
                        @if ($pro->opcaoF != "")
                            <h5><input type="checkbox"  id="resposta[]" name="resposta[]" value="{{ $pro->opcaoF }}"> f). {{ $pro->opcaoF }}</h5><br>
                        @endif
                    @else
                        <input type="text" class="form-control" id="resposta[]" name="resposta[]" placeholder="digite a tua resposta"><br>
                    @endif
                @endif
            @endforeach
            <input type="submit" class="btn btn-primary" value="Guardar Prova resolvida">
         </div>
        </form>
    @endif





</div>
@endsection
