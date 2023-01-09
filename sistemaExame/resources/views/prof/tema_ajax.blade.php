<option value="">Selecione a temática</option>
@foreach ($temat as $t)
    <option value="{{ $t->id }}">{{ $t->titulo }}</option>
@endforeach
