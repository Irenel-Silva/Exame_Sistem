<option value="">Selecione a questão</option>
@foreach ($quest as $que)
    <option value="{{ $que->id }}">{{ $que->questao }}</option>
@endforeach
