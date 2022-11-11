@extends('layouts.main')

@section('title', 'testes')

@section('content')
<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Listados</h1>
    @foreach ($user as $item)
        <p>{{ $item->name }}</p>
    @endforeach

    @foreach ($curso as $c)
        <p>{{ $c->nome }}</p>
    @endforeach



</div>

@endsection
