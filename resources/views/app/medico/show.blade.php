<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Médico</title>
</head>
<body>
    <form >
        <input type="text" name="bi" placeholder="Bilhete de Identidade" disabled value="{{ old('bi', $medico->bi) }}">
        <input type="text" name="nome" placeholder="Nome do Médico" disabled value="{{ old('nome', $medico->nome) }}">
        <input type="text" name="sobrenome" placeholder="Sobrenome do Médico" disabled value="{{ old('sobrenome', $medico->sobrenome) }}">
        <select name="sexo" disabled>
            @foreach (['M' => 'Masculino', 'F' => 'Feminino'] as $key => $sexo)
            <option value="{{ $key }}" {{ old('sexo', $medico->sexo) == $key ? 'selected' : ''}}>{{ $sexo }}</option>
            @endforeach
        </select>
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
        <input type="number" name="ordem" placeholder="Nº de Ordem" disabled value="{{ old('ordem', $medico->ordem) }}">
        <input type="number" name="idade" placeholder="Idade do Médico" disabled value="{{ old('idade', $medico->idade) }}">
        <input type="text" name="contacto1" placeholder="Contacto principal do Médico" disabled value="{{ old('contacto1', $medico->contacto1) }}">
        <input type="text" name="contacto2" placeholder="Contacto secundário do Médico" disabled value="{{ old('contacto2', $medico->contacto1) }}">
        <input type="text" name="morada" placeholder="Morada do Médico" disabled value="{{ old('morada', $medico->morada) }}">

    </form>
    <a href="{{ route('medico.edit', $medico->id) }}">editar</a>

    <a href="{{ route('back') }}">Voltar</a>
</body>
</html>
