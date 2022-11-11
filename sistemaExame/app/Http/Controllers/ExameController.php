<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prova;
use App\Models\Perfil;
use App\Models\Avaliacao;
use App\Models\Uc;
use App\Models\Questoes;
use App\Models\Curso;
use App\Models\User;
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

        $avalic->tipo =$request->tipo;
        $avalic->duracao =$request->duracao;
        $avalic->uc_id =$request->uc_id;
        $avalic->pontuacao =$request->pontuacao;
        $avalic->pontuacao_min =$request->pontuacao_min;
        $avalic->qtidade_questoes =$request->qtidade_questoes;
        $avalic->data=$request->data;


        //$user=auth()->user();
        //$perfil->id = $user->perfis_id;

        $avalic->save();
        return redirect('/prova/juntarPA');
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

     public function juntarprofessorAvaliacao($id){
        $user= auth()->user();
        $user->enunciados()->attach($id);
        $avaliar=Avaliacao::findOrFail($id);
        return redirect('/dashboard')->with('Dados armazenados na tabela M-M(avaliacaos-users');



     }

     public function juntos(){

            return view('dashboard');

     }


     public function quest(){
        return view('/prova/quest');
     }

}
