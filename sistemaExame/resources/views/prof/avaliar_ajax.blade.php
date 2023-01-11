<option value="">Selecione a data</option>
@foreach ($avaliar as $av)
    <option value="{{ $av->id }}"> {{ $av->data }}</option>
@endforeach

