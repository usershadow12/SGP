<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Paciente</title>
</head>
<body>
    <form >
        @for($i = 0; $i < count($horario); $i++)
        @if($horario[$i]->dia === 1)
            <p>dia{{ $i+1 }}: Domingo</p>
        @endif
        @if($horario[$i]->dia === 2)
            <p>dia{{ $i+1 }}: Segunda Feira</p>
        @endif
        @if($horario[$i]->dia === 3)
            <p>dia{{ $i+1 }}: Terça Feira</p>
        @endif
        @if($horario[$i]->dia === 4)
            <p>dia{{ $i+1 }}: Quarta Feira</p>
        @endif
        @if($horario[$i]->dia === 5)
            <p>dia{{ $i+1 }}: Quinta Feira</p>
        @endif
        @if($horario[$i]->dia === 6)
            <p>dia{{ $i+1 }}: Sexta Feira</p>
        @endif
        @if($horario[$i]->dia === 7)
            <p>dia{{ $i+1 }}: Sábado</p>
        @endif
        <p>inicio:{{ $horario[$i]->inicio }} </p>
        <p>Fim:{{ $horario[$i]->fim }} </p>
        @endfor
    </form>

    <a href="{{ route('horario.edit', $horario[0]->medico_id) }}">editar</a>
    <a href="{{ route('back') }}">Voltar</a>
</body>
</html>
