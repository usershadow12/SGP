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
        <input type="text" placeholder="antecedente" value="{{ old('$hpaciente->antecedente') }}" name="antecedente">
        <input type="text" placeholder="historico familiar" value="{{ old('$hpaciente->historico_familiar') }}" name="historico_familiar">
        <input type="text" placeholder="alergia" value="{{ old('$hpaciente->alergia') }}" name="alergia">
        <input type="submit" value="ok">
    </form>

    <a href="{{ route('back') }}">Voltar</a>
</body>
</html>
