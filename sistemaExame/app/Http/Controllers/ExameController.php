<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prova;
use Illuminate\Support\Facades\Redirect;

class ExameController extends Controller
{
    //
    public function index(){
       // $provas= Prova::all();
    return view('welcome'/*, ['provas'=>$provas]*/);

    }

    public function criado(){
        return view('prova.criar');
    }

    public function realizado(){
        return view('prova.realizar');
    }

    public function store(Request $request){
        $prova= new Prova;







        $prova->save();
        return redirect('/');
    }

}
