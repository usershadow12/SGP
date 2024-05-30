<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>
<body>
    <form method="POST" action="{{ route('cadastro.store') }}">
        @csrf
        <div>
            <label for="">Username</label>
            <input type="text" name="name">
        </div>
        <div>
            <label for="">E-mail</label>
            <input type="email" name="email">
        </div>
        <div>
            <label for="">Password</label>
            <input type="password" name="password">
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
