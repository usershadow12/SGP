<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Paciente</title>
</head>
<body>
    <form method="POST" action="{{ route('paciente.update', $paciente->id) }}">
        @csrf
        @method('PUT')

        <input type="text" name="bi" value="{{ old('bi', $paciente->bi) }}" placeholder="Bilhete de Identidade" required>
        <input type="text" name="nome" value="{{ old('nome', $paciente->nome) }}" placeholder="Nome do Paciente" required>
        <input type="text" name="sobrenome" value="{{ old('sobrenome', $paciente->sobrenome) }}" placeholder="Sobrenome do Paciente" required>
        <select name="sexo">
            @foreach (['M' => 'Masculino', 'F' => 'Feminino'] as $key => $sexo)
            <option value="{{ $key }}" {{ old('sexo', $paciente->sexo) == $key ? 'selected' : ''}}>{{ $sexo }}</option>
            @endforeach
        </select>
        <input type="number" name="peso" value="{{ old('peso', $paciente->peso) }}" placeholder="Peso do Paciente" required>
        <input type="number" name="idade" value="{{ old('idade', $paciente->idade) }}" placeholder="Idade do Paciente" required>
        <input type="text" name="contacto1" value="{{ old('contacto1', $paciente->contacto1) }}" placeholder="Contacto do paciente" required>
        <input type="text" name="morada" value="{{ old('morada', $paciente->morada) }}" placeholder="Morada do paciente" required>

        <input type="submit" value="Editar Paciente">
    </form>
</body>
</html>
