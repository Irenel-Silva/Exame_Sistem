<option value="">Selecione a temática</option>
@foreach ($temas as $t)
    <option value="{{ $t->id }}">{{ $t->titulo }}</option>
@endforeach
