<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Paciente</title>
</head>
<body>
    <x-alerta/>
    @if (session('warning'))
        <div>
            {{ session('warning') }}
        </div>
    @endif
    <form method="POST" action="{{ route('paciente.store') }}">
        @csrf

        <input type="text" name="bi" placeholder="Bilhete de Identidade" required>
        <input type="text" name="nome" placeholder="Nome do Paciente" required>
        <input type="text" name="sobrenome" placeholder="Sobrenome do Paciente" required>
        <select name="sexo">
            <option value="M">Masculino</option>
            <option value="F">Feminino</option>
        </select>
        <input type="number" name="peso" placeholder="Peso do Paciente" required>
        <input type="number" name="idade" placeholder="Idade do Paciente" required>
        <input type="text" name="contacto1" placeholder="Contacto principal do paciente" required>
        <input type="text" name="contacto2" placeholder="Contacto secundário do paciente" required>
        <input type="text" name="morada" placeholder="Morada do paciente" required>

        <input type="submit" value="Cadastrar Paciente">
    </form>
</body>
</html>
