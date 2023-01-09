@extends('layouts.main')

@section('title', 'JoinPA')
@section('content')
<div class="col-md-10 offset-md-1 dashboard-title-container">

<form action="/prova/juntarPA/{{ $avaliar->id }}"  method="POST">
    @csrf
    <a href="prova/juntarPA/{{ $avaliar->id }}" class="btn btn-primary"
        id="event-submit"
        onclick="event.preventDefault(); this.closest('form').submit(); ">
        <h1>Autenticar a Prova</h1>
    </a>
</form>
</div>

@endsection
