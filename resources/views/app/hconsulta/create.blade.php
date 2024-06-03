<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>hconsulta</title>
</head>
<body>
    <form action="{{ route('hconsulta.store') }}" method="POST">
        <input type="hidden" value="{{ $id }}" name="consulta_id">
       @include('app.hconsulta.form')
    </form>

    <a href="{{ route('back') }}">Voltar</a>
</body>
</html>
