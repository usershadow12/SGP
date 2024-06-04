<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pacientes</title>
</head>
<body>
    <a name="ok" id="ok" href="{{ route('consulta.create') }}">Marcar Consulta</a>
    <a href="{{ route('paciente.show', $paciente->id) }}">Perfil</a>
    <a href="{{ route('login.logout', $paciente->id) }}">Sair</a>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>DATA CONSULTA</th>
                <th>STATUS</th>
                <th>DETALHES</th>
                <th>Opções</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($consultas as $key => $consulta)
            <tr>
                <td>{{ ++$key }}</td>
                <td>{{ $consulta->data_consulta }}</td>
                <td>{{ $consulta->status }}</td>
                <td><a href="{{ route('consulta.show', $consulta->id) }}">ver mais</a></td>
                @if ($consulta->status === 'Aberta')
                    <td><a href="{{ route('resultado.create', $consulta->id) }}">enviar exame</a></td>
                @endif
                @if ($consulta->status === 'Marcada')
                    <td><a href="{{ route('consulta.edit', $consulta->id) }}">Editar</a></td>
                @endif
            </tr>
            @empty
            <tr>
                <td>Não marcou nehuma consulta ainda.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    <!--<script src="jquery.form.js"></script>-->
    <script>
        @include('app.paciente.jquery')
    </script>
    <script>
    $(function() {
        $('a[name="ok"]').(function(event){
            event.preventDefault();
            alert('Teste mais uma vez');  
        })
    })
</script>

</body>
</html>
