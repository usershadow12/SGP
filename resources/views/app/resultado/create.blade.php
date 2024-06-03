<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('resultado.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="consulta_id" value="{{ $id }}">
        <input type="file" name="resultado" alt="">
        <input type="submit" value="enviar">
    </form>
    
    <a href="{{ route('back') }}">Voltar</a>
</body>
</html>
