@extends('layouts.main')

@section('title', 'Inscricao na UC')

@section('content')
<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1>Inscrição na UC</h1>
    <form action="/inscricaoucaluno" method="POST">
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
      <input type="submit" class="btn btn-primary" value="Salvar">
    </form>
  </div>
@endsection
