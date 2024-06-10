<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Médico</title>
</head>
<body>
    <form method="POST" action="{{ route('medico.store') }}">
        @csrf
        <input type="text" name="bi" placeholder="Bilhete de Identidade" required>
        <input type="text" name="nome" placeholder="Nome do Médico" required>
        <input type="text" name="sobrenome" placeholder="Sobrenome do Médico" required>
        <select name="sexo">
            <option value="M">Masculino</option>
            <option value="F">Feminino</option>
        </select>
        <select name="tipoconsulta_id">
            @foreach ($tipos as $tipo)
            <option value="{{ $tipo->id }}">{{ $tipo->especialista }}</option>
            @endforeach
        </select>
        <input type="number" name="ordem" placeholder="Nº de Ordem" required>
        <input type="number" name="idade" placeholder="Idade do Médico" required>
        <input type="text" name="contacto1" placeholder="Contacto principal do Médico" required>
        <input type="text" name="contacto2" placeholder="Contacto secundário do Médico" >
        <input type="text" name="morada" placeholder="Morada do Médico" required>

        <input type="submit" value="Cadastrar Médico">
    </form>
</body>
</html>
