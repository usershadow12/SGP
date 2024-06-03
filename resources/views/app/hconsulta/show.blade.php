<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<div>
    <label for="">Diagóstico</label>
    <textarea name="diagnostico" id="" cols="30" rows="10" disabled>{{ $hconsulta->diagnostico }}</textarea>
</div>
<div>
    <label for="">Exames</label>
    <textarea name="exame" id="" cols="30" rows="10" disabled>{{ $hconsulta->exame }}</textarea>
</div>
<div>
    <label for="">Observações</label>
    <textarea name="observacoes" id="" cols="30" rows="10" disabled>{{ $hconsulta->observacoes }}</textarea>
</div>
<a href="{{ route('hconsulta.edit',$hconsulta->id ) }}">Editar</a>

<a href="{{ route('back') }}">Voltar</a>
</body>
</html>
