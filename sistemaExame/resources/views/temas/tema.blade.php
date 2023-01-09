@extends('layouts.main')

@section('title', 'Temas')

@section('content')
<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1>Inserir Tema</h1>
    <form action="/temas" method="POST">
      @csrf
      <div class="form-group">
        <label for="title">UC</label>
        <select name="uc_id" id="uc_id" class="form-control" required>
            <option value="">Selecione a UC</option>
            @if(count($ucs)>0)
                @foreach ($ucs as $uc)
                    <option value="{{ $uc->id }}">{{ $uc->nomeu }}</option>

                @endforeach
           @endif

        </select>
      </div>
      <div class="form-group">
        <label for="title">Título do tema:</label>
        <input type="text" class="form-control" id="titulo" name="titulo" placeholder="digite o título da temática" required>
      </div>

      <input type="submit" class="btn btn-primary" value="tema">
    </form>
  </div>
@endsection
