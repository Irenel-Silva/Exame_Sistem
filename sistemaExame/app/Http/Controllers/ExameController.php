<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prova;
use App\Models\Avaliacaos_questoe;
use App\Models\Perfil;
use App\Models\Avaliacao;
use App\Models\Uc;
use App\Models\Questoes;
use App\Models\Curso;
use App\Models\User;
use App\Models\Ucs_users;
use App\Models\Tema;
use App\Models\Modelo;
use App\Models\Resultados;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class ExameController extends Controller
{
    //
    public function index(){


        return view('welcome');

    }

    public function criado() {
        //$user= User::all();
        $ucs= Uc::all();
        //$avaliar=Avaliacao::all();
    return view('prova.criar', ['ucs'=>$ucs,/*'user'=>$user,  'avaliar'=>$avaliar*/]);
    }

    public function realizado(){
        $user= User::all();
        $ucs= Uc::all();
        $avaliar=Avaliacao::all();
        return view('prova.realizar', ['user'=>$user, 'ucs'=>$ucs, 'avaliar'=>$avaliar]);
    }

    public function store(Request $request){
        $avalic= new Avaliacao;

        $ucs= new Uc;
        $unique_id= uniqid('prova_id');
        $avalic->tipoa =$request->tipo;
        $avalic->duracao =$request->duracao;
        $avalic->uc_id =$request->uc_id;
        $avalic->pontuacao =$request->pontuacao;
        $avalic->pontuacao_min =$request->pontuacao_min;
        $avalic->qtidade_questoes =$request->qtidade_questoes;
        $avalic->data=$request->data;
        $avalic->hora=$request->hora;
        $avalic->prova_id= $unique_id;
        //$avalic->user_id=$request->user_id;


        $user=auth()->user();
        $avalic->users_id= $user->id;
        //$perfil->id = $user->perfis_id;

        $avalic->save();
        return redirect('dashboard')->with('msg', 'Armazenado com sucesso!');
    }



    public function testes(){
        // $provas= Prova::all();
         //$perfil= Perfil::all();
        // $avaliacaos= Avaliacao::all();
         //$uc= Uc::all();
         //$questoes= Questoes::all();
         $curso= Curso::all();
         //dd($uc);
        $user= User::all();
     return view('impressao',[ 'user'=>$user/*,'perfil'=>$perfil /*,

                 'avaliacao'=>$avaliacao, 'uc'=>$uc,
                 'questoes'=>$questoes*/, 'curso'=>$curso]);

     }
     /*
     public function juntos($id){
        $user= auth()->user();
        $user->enunciados()->attach($id);
        $avaliar=Avaliacao::findOrFail($id);

            return view('dashboard')->with('msg','Dados armazenados na tabela M-M(avaliacaos-users');

     }*/

     public function quest(){
            $user= User::all();
            $ucs= Uc::all();
            $tema= Tema::all();
        return view('questionarios.questo', ['user'=>$user, 'ucs'=>$ucs, 'tema'=>$tema]);
     }

     public function salvaquestao(Request $request){
        $questao= new Questoes;
        $questao->tipoq= $request->tipo;
        $questao->questao= $request->questao;
        $questao->opcaoA= $request->opcao1;
        $questao->opcaoB= $request->opcao2;
        $questao->opcaoC= $request->opcao3;
        $questao->opcaoD= $request->opcao4;
        $questao->opcaoE= $request->opcao5;
        $questao->opcaoF= $request->opcao6;
        $questao->respostaq= $request->resposta;
        $questao->pontuacao_questao= $request->pontuacao_questao;
        $questao->uc_id= $request->uc_id;
        $questao->tema_id= $request->tema_id;

        $questao->save();
        return redirect('dashboard')->with('msg', 'Armazenado com sucesso!');
     }


     public function pegar($id){
        $avaliar= Avaliacao::findOrFail($id);
        return view('/prova/juntarPA/{id}', ['avaliar'=>$avaliar]);
     }

     public function tematica(){
        $ucs= Uc::all();
        return view('temas.tema', ['ucs'=>$ucs]);

     }

     public function disciplina(){
        return view('ucs.uc');
     }

     public function __construct(Uc $ucs, Avaliacao $avaliar, Tema $tema, Questoes $quest){
       /* $this->ucs= $ucs;
        $this->avaliar= $avaliar;
        $this->tema= $tema;
        $this->quest= $quest;*/
     }

     public function prova(){
        $user=auth()->user();
        /*$ucs= $this->ucs->orderBy('nomeu', 'ASC')->get();
        $avaliar= $this->avaliar->Where('id', '=',0)->orderBy('data', 'ASC')->get();
        #$avaliar=Avaliacao::all();
        $temat=$this->tema->Where('id', '=',0)->orderBy('titulo', 'ASC')->get();
        $quest=$this->quest->Where('id', '=',0)->orderBy('questao', 'ASC')->get();*/
        $ucs= Uc::orderBy('nomeu', 'ASC')->get();
        $avaliar= Avaliacao::Where('id', '=',0)->orderBy('data', 'ASC')->get();
        $temat= Tema::Where('id', '=',0)->orderBy('titulo', 'ASC')->get();
        $quest= Questoes::Where('id', '=',0)->orderBy('questao', 'ASC')->get();
                //$avaliar= Avaliacao::with('questoes_id')->get();
        /*$sql= "select  distinct avaliacaos.id, avaliacaos.data, avaliacaos.qtidade_questoes as aqq, avaliacaos_questoes.id as aqi, avaliacaos_questoes.avaliacaos_id,
                avaliacaos_questoes.questoes_id, ucs.id, ucs.nomeu   from avaliacaos_questoes, avaliacaos, ucs";
        $sql= $sql . " Where avaliacaos.uc_id= ucs.id ";
        $sql= $sql . " and avaliacaos.id= avaliacaos_questoes.avaliacaos_id ";
        $sql= $sql . " order by avaliacaos.id";
        $qquestoes= DB::select($sql);*/

     return view('prof.addqa', ['quest'=>$quest, 'temat'=>$temat,'avaliar'=>$avaliar, 'ucs'=>$ucs/*, 'qquestoes'=>$qquestoes*/]);

     }

     public function load_avtem(Request $request){
        $dataform= $request->all();
        $uc_id= $dataform['uc_id'];
        $sql= "select  distinct avaliacaos.id, avaliacaos.data, avaliacaos.uc_id, avaliacaos.qtidade_questoes from ucs, avaliacaos ";
        $sql= $sql . " Where avaliacaos.uc_id= '$uc_id' ";
        $sql= $sql . " order by avaliacaos.data";
        $avaliar= DB::select($sql);
        //$cont=0;
        /*foreach( $avaliar as $ava){
            if($cont<=0){
                if($ava->aqq<count($ava->aqai)){
                    //$avaliar= DB::select($sql);
                }
                else{
                    $avaliar=0;
                }
            }
            $cont++;
        }*/
        return view('prof.avaliar_ajax', ['avaliar'=>$avaliar]);

     }
     public function load_tem(Request $request){
        $dataform= $request->all();
        $uc_id= $dataform['uc_id'];
        $sql= "select distinct temas.id, temas.titulo, temas.uc_id from ucs, temas ";
        $sql= $sql . " Where temas.uc_id= '$uc_id' ";
        $sql= $sql . " order by temas.titulo ";
        $temat= DB::select($sql);

        return view('prof.tema_ajax', ['temat'=>$temat]);

     }

     public function load_quest(Request $request){
        $dataform= $request->all();
        $tema_id= $dataform['tema_id'];
        $sql= "select distinct questoes.id, questoes.questao, questoes.tema_id from temas, questoes ";
        $sql= $sql . " Where questoes.tema_id= '$tema_id' ";
        $sql= $sql . " order by questoes.questao ";
        $quest= DB::select($sql);

        return view('prof.quest_ajax', ['quest'=>$quest]);

     }
     public function verprova(){
        $user=auth()->user();
        $quest=Questoes::all();
        //$quest= $this->quest;
        $tema=Tema::all();
        //$tema= $this->tema;
        #$avaliar= Avaliacao::with('quest','tema')->get();
        //$avaliar= $this->avaliar;
        $sql= "select avaliacaos.id as idav, avaliacaos.tipoa, avaliacaos.uc_id, avaliacaos.users_id,
            avaliacaos.data, avaliacaos.duracao, ucs.id, ucs.nomeu from avaliacaos, ucs ";
        $sql= $sql . " Where avaliacaos.users_id= '$user->id' ";
        $sql= $sql . " and avaliacaos.uc_id= ucs.id ";
        $sql= $sql . " order by ucs.nomeu ";
        $quest= DB::select($sql);
        //$avaliar= Avaliacao::with('uc')->get();

        return view('prof.verpprof', ['quest'=>$quest, /*'tema'=>$tema,'avaliar'=>$avaliar*/]);
     }



     public function editprova($id){
        $avaliacao= Avaliacao::findOrFail($id);
        return view('prova.editarprova', ['avaliacao'=>$avaliacao]);


     }
     public function updateprova(Request $request){
        Avaliacao::findOrFail($request->id)->update($request->all());
        return redirect('dashboard')->with('msg', 'Editado com sucesso!');

     }
     public function storetema(Request $request){
        $tema= new Tema;
        $tema->titulo =$request->titulo;
        $tema->uc_id= $request->uc_id;
        $tema->save();

        return redirect('dashboard')->with('msg', 'Armazenado com sucesso!');
     }

     public function storeuc(Request $request){
        $uc= new Uc;
        $uc->nomeu =$request->nome;
        $uc->qcreditos= $request->qcreditos;
        $uc->carga_horaria =$request->carga_horaria;
        $uc->qprovas= $request->qprovas;
        $uc->save();

        return redirect('dashboard')->with('msg', 'Armazenado com sucesso!');
     }


     public function storeadd(Request $request){



        $avid=$request->avaliacao_id;
        $avque= $request->questoes_id;
        //$qq= $request->qquestoes;
        $sql= "select distinct * from avaliacaos_questoes ";
        //$sql= $sql . " Where avaliacaos.id= '$avid' ";
        //$sql= $sql . " and avaliacaos_questoes.avaliacaos_id= avaliacaos.id ";
        $sql= $sql . " Where avaliacaos_questoes.avaliacaos_id= '$avid' ";
        $sql= $sql . " order by avaliacaos_questoes.questoes_id ";
        $comparar= DB::select($sql);
        $cont=0; $com=0; $rep=0;




        $sql= "select distinct * from avaliacaos ";
        $sql= $sql . " Where avaliacaos.id= '$avid' ";
        $sql= $sql . " order by avaliacaos.qtidade_questoes ";
        $aval= DB::select($sql);
        foreach($aval as $key => $ava){
            $qq= $ava->qtidade_questoes;

        }
        foreach($comparar as $key => $co){
            if ($avque == $co->questoes_id) {
                $cont++;
            }
            $com++;
        }
        if ($cont>0) {
            return redirect('dashboard')->with('msg', 'Questão selecionada existe na prova tente anexar outra para não existir questões duplicadas!');
        }
        if ($com==$qq) {
            return redirect('dashboard')->with('msg', 'O Teste Já se encontra com a quantidade  total de questões !');
        }
        else{
                $avque= new Avaliacaos_questoe;
                $avque->avaliacaos_id =$request->avaliacao_id;
                $avque->questoes_id= $request->questoes_id;
                $avque->save();

                return redirect('dashboard')->with('msg', 'Armazenado com sucesso!');
        }
     }


     public function realizaravaliacao(){
        $user= auth()->user();
        $sql= "select * from ucs, avaliacaos_questoes, avaliacaos, questoes, ucs_users ";
        $sql= $sql . " Where avaliacaos_questoes.avaliacaos_id= avaliacaos.id ";
        $sql= $sql . " and avaliacaos.uc_id= ucs.id ";
        $sql= $sql . " and avaliacaos_questoes.questoes_id= questoes.id ";
        $sql= $sql . " and questoes.uc_id= ucs.id ";
        $sql= $sql . " and ucs_users.uc_id= ucs.id ";
        $sql= $sql . " and ucs_users.user_id= '$user' ";
        $sql= $sql . " order by questoes.questao ";
        $prova= DB::select($sql);


        return view('alunos.provaaluno',['prova'=>$prova]);
     }

     public function veravaliacao(){
        $user= auth()->user();
        $sql= "select avaliacaos.id as idav,avaliacaos.tipoa, avaliacaos.prova_id, avaliacaos.data, avaliacaos.hora, avaliacaos.duracao, ucs.nomeu, ucs_users.uc_id, ucs_users.user_id from avaliacaos, ucs, ucs_users ";
        $sql= $sql . " Where ucs_users.uc_id= ucs.id ";
        //$sql= $sql . " Where avaliacaos.uc_id= ucs.id ";
        //$sql= $sql . " and ucs_users.uc_id= ucs.id ";
        $sql= $sql . " and ucs_users.user_id= '$user->id' ";
        $sql= $sql . " order by ucs.nomeu ";
        $visual= DB::select($sql);
        return view('alunos.veraluno', ['visual'=>$visual]);
     }



     public function storealunaval(Request $request){
        $user= auth()->user();
        $prov= $request->prova_id;
        /*$sql= "select * from ucs, avaliacaos_questoes, avaliacaos, questoes ";
        $sql= $sql . " Where avaliacaos_questoes.avaliacaos_id= avaliacaos.id ";
        $sql= $sql . " and avaliacaos.uc_id= ucs.id ";
        $sql= $sql . " and avaliacaos_questoes.questoes_id= questoes.id ";
        $sql= $sql . " and questoes.uc_id= ucs.id ";
        $sql= $sql . " order by questoes.questao ";
        $prova= DB::select($sql);*/
        $sql= "select avaliacaos.id as idav, avaliacaos.tipoa, avaliacaos.prova_id, avaliacaos.data, avaliacaos.hora, avaliacaos.duracao, ucs.id, ucs.nomeu, questoes.questao, questoes.opcaoA, questoes.opcaoB, questoes.opcaoC, questoes.opcaoD, questoes.opcaoE, questoes.opcaoF, questoes.respostaq, questoes.tipoq, questoes.pontuacao_questao  from ucs, avaliacaos_questoes, avaliacaos, questoes ";
        $sql= $sql . " Where avaliacaos_questoes.avaliacaos_id= avaliacaos.id ";
        $sql= $sql . " and avaliacaos.uc_id= ucs.id ";
        $sql= $sql . " and avaliacaos.id= '$prov' ";
        $sql= $sql . " and avaliacaos_questoes.questoes_id= questoes.id ";
        $sql= $sql . " and questoes.uc_id= ucs.id ";
        $sql= $sql . " order by questoes.id ";
        $prova= DB::select($sql);

        $responde= $request->resposta;
        $avaid= $request->prova_id;
        $usuid= $user->id;
        $modelo= new Modelo;
        /*for($i=0; $i < count($responde); $i++){

            $modelo->avaliacaos_id= $avaid;
            $modelo->user_id= $usuid;
            $modelo->resposta= $responde[$i];
            $modelo->save();
        }*/
        foreach($prova as $key => $provas){

            $modelo->avaliacaos_id= $avaid;
            $modelo->user_id= $usuid;
            $modelo->respostam= $responde[$key];

            if($provas->tipoq == "selecao"){
                if($provas->respostaq == $responde[$key]){
                    $valor= $provas->pontuacao_questao;
                }
                else{
                    $valor= 0;
                }
            }
            else{
                $valor= 0;
            }

            $savedado= [
                'avaliacaos_id' => $avaid,
                'user_id' => $usuid,
                'respostam' => $responde[$key],
                'pontuacaom' => $valor
            ];
            //$modelo->save();
            $modelo::insert($savedado);
        }

        /*for($i=0; $i < count($responde); $i++){
            $savedado= [
                'avaliacaos_id' => $request->prova_id,
                'user_id' => $user->id,
                'resposta' => $request->resposta[$i]
            ];
            $modelo->$savedado;
            $modelo->save();

        }*/
        //$modelo_id= $modelo->id;


        return redirect('dashboard')->with('msg', 'Armazenado com sucesso!');


     }

     public function editpontoresposta($id){
        $modelo= Modelo::findOrFail($id);
        return view('alunos.editpontoresposta', ['modelo'=>$modelo]);


     }
     public function updatepr(Request $request){
        Modelo::findOrFail($request->id)->update($request->all());
        return redirect('dashboard')->with('msg', 'Editado com sucesso!');

     }

     public function show($prova_id){
        $user= auth()->user();
        $modelos= Modelo::all();
        $sql= "select avaliacaos.id as idav, avaliacaos.tipoa, avaliacaos.prova_id, avaliacaos.data, avaliacaos.hora, avaliacaos.duracao, ucs.id, ucs.nomeu, questoes.questao, questoes.opcaoA, questoes.opcaoB, questoes.opcaoC, questoes.opcaoD, questoes.opcaoE, questoes.opcaoF, questoes.respostaq, questoes.tipoq, questoes.pontuacao_questao  from ucs, avaliacaos_questoes, avaliacaos, questoes ";
        $sql= $sql . " Where avaliacaos_questoes.avaliacaos_id= avaliacaos.id ";
        $sql= $sql . " and avaliacaos.uc_id= ucs.id ";
        $sql= $sql . " and avaliacaos.id= '$prova_id' ";
        $sql= $sql . " and avaliacaos_questoes.questoes_id= questoes.id ";
        $sql= $sql . " and questoes.uc_id= ucs.id ";
        $sql= $sql . " order by questoes.id ";
        $prova= DB::select($sql);
       // $provas=$prova::findOrFail();
        $avaliar= Avaliacao::findOrFail($prova_id);
        $provado= $prova_id;

        return view('alunos.provaaluno', ['avaliar'=>$avaliar,'prova'=>$prova, 'provado'=>$provado, 'modelos'=>$modelos]);
     }

     public function resultado($prova_id){
        $sql= "select distinct avaliacaos.id as idav, avaliacaos.tipoa, avaliacaos.data, avaliacaos.hora, avaliacaos.duracao,
                avaliacaos.pontuacao_min, ucs.id as iduc, ucs.nomeu, users.id as idut, users.name, modelos.id as idmo,
                 modelos.user_id, modelos.avaliacaos_id, modelos.respostam, modelos.pontuacaom,  questoes.id as idque,
                 questoes.tipoq, questoes.questao, questoes.respostaq, questoes.pontuacao_questao
                 from questoes, modelos, users, ucs, avaliacaos ";
        $sql= $sql . " where avaliacaos.uc_id= ucs.id ";
        $sql= $sql . " and avaliacaos.id= '$prova_id' ";
        $sql= $sql . " and modelos.user_id= users.id ";
        $sql= $sql . " and questoes.id= modelos.id ";
        $sql= $sql . " order by modelos.id ";
        //$sql= $sql . " order by users.name ";
        //$sql= $sql . " and avaliacaos_questoes.questoes_id= questoes.id ";
        //$sql= $sql . " and questoes.uc_id= ucs.id ";
        //$sql= $sql . " order by ucs.nomeu ";
        $qualificacoes= DB::select($sql);
        $provado= $prova_id;
        $modelos= Modelo::all();

        return view('resultados.addresultado', ['qualificacoes'=>$qualificacoes, 'provado'=>$provado, 'modelos'=>$modelos]);

     }
     public function listarprova(){
        $user=auth()->user();
        /*ucs_users.uc_id, ucs_users.user_id, users.id as uid, users.name      , ucs_users, users*/
        $sql= "select distinct avaliacaos.id as idav, avaliacaos.tipoa, avaliacaos.uc_id as avuc, avaliacaos.users_id as avus,
                ucs.id, ucs.nomeu from avaliacaos, ucs ";
        $sql= $sql . " Where avaliacaos.users_id= '$user->id' ";
        //$sql= $sql . " and ucs_users.uc_id= ucs.id ";
        //$sql= $sql . " and ucs_users.user_id= users.id ";
        $sql= $sql . " and avaliacaos.uc_id= ucs.id ";
        $sql= $sql . " order by ucs.nomeu ";
        $listas= DB::select($sql);

        return view('resultados.listaprovaprof', ['listas'=>$listas]);

     }

     public function showresultado($prova_id){
        $user=auth()->user();
        $quest=Questoes::all();
        $tema=Tema::all();
        $sql= "select distinct * from avaliacaos, ucs, users, resultados  ";
        $sql= $sql . " Where avaliacaos.users_id= '$user->id' ";
        $sql= $sql . " and avaliacaos.uc_id= ucs.id ";
        $sql= $sql . " and avaliacaos.id= '$prova_id' ";
        $sql= $sql . " and resultados.avaliacaos_id= '$prova_id' ";
        $sql= $sql . " and resultados.user_id= users.id ";
        //$sql= $sql . " and ucs_users.uc_id= ucs.id ";
        //$sql= $sql . " and ucs_users.user_id= users.id ";
        $sql= $sql . " order by ucs.nomeu ";
        $notas= DB::select($sql);

        return view('resultados.resultado', ['quest'=>$quest, 'notas'=>$notas]);

     }



     public function showqualificacao(){
        $user=auth()->user();
        $quest=Questoes::all();
        $tema=Tema::all();
        $sql= "select distinct * from avaliacaos, ucs, resultados  ";
        $sql= $sql . " Where resultados.user_id= '$user->id' ";
        $sql= $sql . " and avaliacaos.uc_id= ucs.id ";
        $sql= $sql . " and avaliacaos.id= resultados.avaliacaos_id ";

        //$sql= $sql . " and ucs_users.uc_id= ucs.id ";
        //$sql= $sql . " and ucs_users.user_id= users.id ";
        $sql= $sql . " order by ucs.nomeu ";
        $notas= DB::select($sql);

        return view('resultados.qualificacoes', ['notas'=>$notas]);

     }

     public function storeresultado(Request $request){
        //$modelo= Modelo();
        $resultado= new Resultados();
        $prov= $request->prova_id;
        /*$sql= "select avaliacaos.id as idav, avaliacaos.tipoa, avaliacaos.data, avaliacaos.hora, avaliacaos.duracao, avaliacaos.pontuacao_min, ucs.id as iduc, ucs.nomeu, users.id as idut, users.name, modelos.id as idmo, modelos.user_id as muid, modelos.avaliacaos_id, modelos.respostam, modelos.pontuacaom,  questoes.id as idque, questoes.respostaq, questoes.pontuacao_questao from avaliacaos_questoes, questoes, modelos, users, ucs, avaliacaos ";
        $sql= $sql . " where avaliacaos.uc_id= ucs.id ";
        $sql= $sql . " and questoes.uc_id= ucs.id ";
        $sql= $sql . " and avaliacaos.users_id= users.id ";*/

        //$sql= $sql . " and avaliacaos_questoes.avaliacaos_id= avaliacaos.id ";
       // $sql= $sql . " and avaliacaos_questoes.questoes_id= questoes.id ";
      /* $sql= $sql . " and modelos.user_id= users.id ";
       $sql= $sql . " and avaliacaos.id= '$prov' ";
       $sql= $sql . " and modelos.avaliacaos_id= '$prov'  ";*/
        //$sql= $sql . " and modelos.avaliacaos_id=avaliacaos.id  ";

        //$sql= $sql . " group by idav, idut, users.name, idmo, idque, avaliacaos_questoes.id ";

       /* $sql= "select avaliacaos.id, avaliacaos.tipoa, avaliacaos.pontuacao_min,
               avaliacaos.uc_id, avaliacaos.users_id, users.id, users.name,
               modelos.id, modelos.avaliacaos_id, modelos.respostam, modelos.pontuacaom,
               modelos.user_id from avaliacoes as av
               left join ucs on av.uc_id=ucs.id
               left join users on av.users_id=users.id
               left join modelos as mo on (mo.avaliacaos_id=av.id and mo.user_id=users.id)
               where  (av.id= '$prov' and mo.avaliacaos_id= '$prov') ";*/
        /*$sql= $sql . " where avaliacaos.uc_id= ucs.id ";
            $sql= $sql . " and questoes.uc_id= ucs.id ";
            $sql= $sql . " and avaliacaos.users_id= users.id ";*/
        //$sql= $sql . " and avaliacaos_questoes.avaliacaos_id= avaliacaos.id ";
       // $sql= $sql . " and avaliacaos_questoes.questoes_id= questoes.id ";
       /*$sql= $sql . " and modelos.user_id= users.id ";
            $sql= $sql . " and avaliacaos.id= '$prov' ";
            $sql= $sql . " and modelos.avaliacaos_id= '$prov'  ";
            $sql= $sql . " order by users.id ";*/
        $sql= "select avaliacaos.id as idav, avaliacaos.tipoa, avaliacaos.pontuacao_min, avaliacaos.uc_id, users.id as idut, users.name, ucs.id, ucs.nomeu, ucs_users.uc_id as uuuci, ucs_users.user_id as uuusi from avaliacaos, users, ucs, ucs_users";
        $sql= $sql . " where avaliacaos.id= '$prov' ";
        $sql= $sql . " and avaliacaos.uc_id= ucs.id ";
        $sql= $sql . " and ucs_users.user_id= users.id ";
        $sql= $sql . " and ucs_users.uc_id= ucs.id ";
        $sql= $sql . " order by users.id ";
        $qualificacoes= DB::select($sql);

        $sql= "select modelos.id as idmo, modelos.avaliacaos_id, modelos.respostam, modelos.pontuacaom, modelos.user_id as muid, users.id as idut, users.name from modelos, users ";
        $sql= $sql . " where modelos.avaliacaos_id= '$prov' ";
        $sql= $sql . " and modelos.user_id= users.id ";
        $sql= $sql . " order by users.id ";
        $modelagem= DB::select($sql);
        //$provado= $prova_id;
        //$av= $qualificacoes->idav;
        foreach ($qualificacoes as $key => $qua) {
            $somaponto=0;
            $av= $qua->idav;
            $usuario= $qua->idut;
            //$mod= $qua->idmo;

                foreach ($modelagem as $key => $mode) {
                    $mod= 0;
                    if($mode->muid== $qua->idut)
                    {
                        $somaponto+=$mode->pontuacaom;
                    }
                    //$mod= $mode->idmo;
                }
            if ($somaponto>$qua->pontuacao_min) {
                $estado= 'Apto';
            }
            else {
                $estado= 'Napto';
            }

            $savedado= [
                'avaliacaos_id' => $av,
                'user_id' => $usuario,
                //'modelo_id' => $mod,
                'pontuacaototal_aluno' => $somaponto,
                'status'=> $estado
            ];
            //$modelo->save();
            $resultado::insert($savedado);
        }


        return redirect('dashboard')->with('msg', 'Armazenado com sucesso!');

     }


    public function showinscricaouc(){
        $user=auth()->user();
        $ucs= Uc::all();


        return view('inscricaoucaluno.inscricaouc', ['ucs'=>$ucs]);
    }
    public function storeinscricaouc(Request $request){
        $inscricao= new Ucs_users;
        $user=auth()->user();
        $inscricao->uc_id= $request->uc_id;
        $inscricao->user_id= $user->id;
        $inscricao->save();

        return redirect('dashboard')->with('msg', 'Armazenado com sucesso!');

    }

}
