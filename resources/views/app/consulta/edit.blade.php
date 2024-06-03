<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Remarcar Consulta</title>
</head>
<body>
    <x-alerta/>
    <form method="POST" action="{{ route('consulta.update', $consulta->id) }}">
        @method('PUT')
@csrf
<div>
    <label for="">Data da Consulta</label>
    <input type="datetime-local" name="data_consulta" required value="{{ $consulta->data_consulta ?? old('data_consulta') }}" >
</div>
<div>
    <select name="tipoconsulta_id">
        <optgroup label="Tipo de Consulta">
            @foreach ($tipos as $tiposs)
                @foreach ([$tiposs->id => $tiposs->nome] as $key => $tipo)
                    <option value="{{ $key }}" {{$consulta->tipoconsulta_id == $key ? 'selected' : ''}}>
                    {{ $tiposs->nome }}</option>
                @endforeach
            @endforeach
        </optgroup>
    </select>
</div>
<div>
    <select name="medico_id">
        <optgroup label="Selecione o Medico">
            @foreach ($medicos as $medicoss)
                @foreach ([$medicoss->id => $medicoss->nome] as $key => $nome)
                <option value="{{ $key }}" {{ $consulta->medico_id == $key ? 'selected' : ''}}>{{ $nome }}</option>
                @endforeach
            @endforeach
        </optgroup>
    </select>
</div>

        <input type="submit" value="Remarcar Consulta">
    </form>

    <a href="{{ route('back') }}">Voltar</a>
</body>
</html>
