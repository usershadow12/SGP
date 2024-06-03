<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marcar Consulta</title>
</head>
<body>
    <x-alerta/>
    <form method="POST" action="{{ route('consulta.store') }}">

@csrf
<div>
    <label for="">Data da Consulta</label>
    <input type="datetime-local" name="data_consulta" required>
</div>
<div>
    <select name="tipoconsulta_id">
        <optgroup label="Tipo de Consulta">
                @foreach ($tipos as $tipo)
                    <option value="{{ $tipo->id }}">{{ $tipo->nome }}</option>
                @endforeach
        </optgroup>
    </select>
</div>
<div>
    <select name="medico_id">
        <optgroup label="Selecione o médico">
                @foreach ($medicos as $medico)
                    <option value="{{ $medico->id }}">{{ $medico->nome }}</option>
                @endforeach
        </optgroup>
    </select>
</div>

        <input type="submit" value="Marcar Consulta">
    </form>
    <a href="{{ route('back') }}">Voltar</a>
</body>
</html>
