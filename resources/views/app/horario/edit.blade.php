<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Paciente</title>
</head>
<body>
    <form method="POST" action="{{ route('hpaciente.update', $hpaciente->id) }}">
        @csrf
        @method('PUT')
        <div>
            <select name="especialidade_id" disabled>
                <optgroup label="Especialidade">
                    @foreach ($especialidades as $esp)
                        @foreach ([$esp->id => $esp->nome] as $key => $tipo)
                        <option value="{{ $key }}" {{ old('especialidade_id', $medico->especialidade_id) == $key ? 'selected' : ''}}>{{ $esp->nome }}</option>
                        @endforeach
                    @endforeach
                </optgroup>
            </select>
        </div>
    </form>

    <a href="{{ route('back') }}">Voltar</a>
</body>
</html>
