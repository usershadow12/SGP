<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Paciente</title>
</head>
<body>
    <form method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="bi" value="{{ $paciente->bi }}" placeholder="Bilhete de Identidade" disabled>
        <input type="text" name="nome" value="{{  $paciente->nome}}" placeholder="Nome do Paciente" disabled>
        <input type="text" name="sobrenome" value="{{  $paciente->sobrenome }}" placeholder="Sobrenome do Paciente" disabled>
        <select name="sexo" disabled>
            @foreach (['M' => 'Masculino', 'F' => 'Feminino'] as $key => $sexo)
            <option value="{{ $key }}" {{ old('sexo', $paciente->sexo) == $key ? 'selected' : ''}}>{{ $sexo }}</option>
            @endforeach
        </select>
        <input type="number" name="peso" value="{{$paciente->peso }}" placeholder="Peso do Paciente" disabled>
        <input type="number" name="idade" value="{{ $paciente->idade }}" placeholder="Idade do Paciente" disabled>
        <input type="text" name="contacto1" value="{{$paciente->contacto1 }}" placeholder="Contacto do paciente" disabled>
        <input type="text" name="contacto2" value="{{$paciente->contacto2 }}" placeholder="Contacto do paciente" disabled>
        <input type="text" name="morada" value="{{ $paciente->morada}}" placeholder="Morada do paciente" disabled>
    </form>
    <a href="{{ route('paciente.edit', $paciente) }}">Editar dados</a>

    <a href="{{ route('back') }}">Voltar</a>
</body>
</html>
