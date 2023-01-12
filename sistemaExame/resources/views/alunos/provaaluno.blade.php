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
        <!--<div  id="timer" class="form-group">-->
            <h5><span id="min" ></span><b>  Minutos</b>
            <span></span><b>:</b>
		    <span id="remain"></span><b>  Segundos</b></h5>

        <!--</div>-->
        @foreach ($prova as $pro)

            @if($pro->idav==$provado)
                @while ($cont==0)

                <h4 class="text-left">{{ $pro->nomeu }}</h4><br>
                <h4 class="text-left">{{$pro->data}}</h4><br>
                <h4 class="text-left">{{$pro->duracao}}</h4><br>
                <?php $cont++?>
                <div class="form-group">
                    <input type="hidden" id="duracaoa" name="duracaoa" value="{{ $pro->duracao }}">
                </div>
                @endwhile
            @endif
        @endforeach
        </p>
        <br>
        <br>
        <form action="/alunos"  id="form" method="POST">
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
                    <textarea rows="9" cols="18" class="form-control" id="resposta[]" name="resposta[]" placeholder="digite a tua resposta"></textarea><br>
                        <!--<input type="text" class="form-control" id="resposta[]" name="resposta[]" placeholder="digite a tua resposta"><br>-->
                    @endif
                @endif
            @endforeach
            <input type="submit" class="btn btn-primary" value="Guardar Prova resolvida">
         </div>
        </form>
    @endif
    <!--<script src="js/crono.js" defer></script>-->
    <script type="text/javascript">
        $(document).ready(function(){
           /*function starttimer(duracao, display){
                var timer= duracao, minutos, segundos;
                setInterval(function(){
                    minutos= parseInt(timer / 60, 10);
                    segundos= parseInt(timer % 60, 10);
                    minutos= minutos < 10 ? "0" + minutos : minutos;
                    segundos= segundos < 10 ? "0" + segundos : segundos;


                    display.textContent= minutos + ":" + segundos;
                    if(--timer <0){
                        timer =duracao;
                    }

                }, 1000);

                document.write("form submitted");
            }

            window.onload= function(){
                var tempo= $('#duracaoa').val();
                var duracao = 60 * tempo; // conversão para segundos
                var display = document.querySelector("#timer"); //elemento para exibir o timer

                starttimer(duracao, display);
            }*/
            /* OUTRA TENTATIVA*/
            /*function countDown(){
                document.getElementById("min").innerHTML= minutes;
                document.getElementById("remain").innerHTML= seconds;
                setTimeout("countDown()",1000);
                    if(minutes == 0 && seconds == 0)
                        {

                            //document.form.submit();
                            document.write("form submitted");
                        }
                    else
                        {
                            seconds--;
                            if(seconds ==0 && minutes > 0)
                        {
                            minutes--;
                            seconds=60;
                        }
                    }
            }

            window.onload =counter;
            function counter()
            {
            minutes= 2;
            //$('#duracaoa').val();
            seconds =60;
            countDown();
            }*/








        });

    </script>


    <script type="text/javascript">
        window.onload=counter;
        function counter()
        {
        minutos=$('#duracaoa').val();
        segundos =60;
        minutos= minutos < 10 ? "0" + minutos : minutos;
        segundos= segundos < 10 ? "0" + segundos : segundos;
        countDown();
        }
    </script>

    <script type="text/javascript">
        function countDown(){
        document.getElementById("min").innerHTML= minutos;
        document.getElementById("remain").innerHTML= segundos;
        setTimeout("countDown()",1000);
            if(minutos == 0 && segundos == 0)
                {

                    //document.form.submit();
                    document.getElementById("form").submit();
                    //document.write("form submitted");
                }
            else
                {
                segundos--;
                if(segundos ==0 && minutos > 0)
                {
                    minutos--;
                    segundos=60;
                }
                }
        }
    </script>




</div>
@endsection
