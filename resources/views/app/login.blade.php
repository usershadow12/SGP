<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>
<body>
    <x-alerta/>
    @if (session('danger'))
        <div>
            {{ session('danger') }}
        </div>
    @endif
    <form method="POST" action="{{ route('auth') }}">
        @csrf
        <div>
            <label for="">Username</label>
            <input type="text" name="name" required>
        </div>
        <div>
            <label for="">Password</label>
            <input type="password" name="password" required>
        </div>
        <input type="submit" value="login">
    </form>
    <p>Se não possui uma conta faça <a href="{{ route('cadastro.create') }}">cadastro</a></p>

</body>
</html>
