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
        <input type="text" placeholder="antecedente" value="{{ $hpaciente->antecedente }}" name="antecedente" disabled>
        <input type="text" placeholder="historico familiar" value="{{ $hpaciente->historico_familiar }}" name="historico_familiar" disabled>
        <input type="text" placeholder="alergia" value="{{ $hpaciente->alergia }}" name="alergia" disabled>
    </form>

    <a href="{{ route('hpaciente.edit', $hpaciente->id) }}">editar</a>
    <a href="{{ route('back') }}">Voltar</a>
</body>
</html>
