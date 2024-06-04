<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Hpaciente</title>
</head>
<body>
    <form method="POST" action="{{ route('hpaciente.store') }}">
        @csrf
        <input type="text" placeholder="antecedente" name="antecedente">
        <input type="text" placeholder="historico familiar" name="historico_familiar">
        <input type="text" placeholder="alergia" name="alergia">
        <input type="submit" value="ok">
    </form>
</body>
</html>
