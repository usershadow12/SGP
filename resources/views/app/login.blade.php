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
    <form name="ok" method="POST" action="{{ route('auth') }}">
        @csrf
        <div>
            <label for="">E-mail</label>
            <input type="email" name="email">
        </div>
        <div>
            <label for="">Password</label>
            <input type="password" name="password">
        </div>
        <input type="submit" value="login">
    </form>
    <p>Se não possui uma conta faça <a href="{{ route('cadastro.create') }}">cadastro</a></p>

    <script>
        @include('app.jquery1')
    </script>
    <script>
        @include('app.jquery')
    </script>
    <script>
    $(function() {
        $('form[name="ok"]').onclick(function(event){
            event.preventDefault();
            alert('Teste mais uma vez');  
        })
    })
</script>
</body>
</html>
