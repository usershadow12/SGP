<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>
<body>
    <x-alerta/>
    @if (session('warning'))
        <div>
            {{ session('warning') }}
        </div>
    @endif
    <form method="POST" action="{{ route('cadastro.store') }}">
        @csrf
        <div>
            <label for="">Username</label>
            <input type="text" name="name" required>
        </div>
        <div>
            <label for="">E-mail</label>
            <input type="email" name="email" required>
        </div>
        <div>
            <label for="">Password</label>
            <input type="password" name="password" required>
        </div>
        <div>
            <select name="tipo" id="">
                <optgroup label="Tipo">
                    <option value="paciente">Paciente</option>
                    <option value="medico">Médico</option>
                </optgroup>
            </select>
        </di>
        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>
