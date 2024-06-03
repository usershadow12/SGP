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
        <label for="">Duração da Medicação</label>
        <input type="number" name="duracao"value={{ $prescricao->duracao}} disabled>
    </div>
    <div>
        <label for="">Descrição da Medicação </label>
        <textarea name="descricao" id="" cols="30" rows="10" disabled>{{ $prescricao->descricao}}</textarea>
    </div>
    <div>
        <label for="">Indicação Especial</label>
        <textarea name="indicacao_especial" id="" cols="30" rows="10" disabled>{{ $prescricao->indicacao_especial}}</textarea>
    </div>
<a href="{{ route('prescricao.edit',$prescricao->id ) }}">Editar</a>

<a href="{{ route('back') }}">Voltar</a>
</body>
</html>
