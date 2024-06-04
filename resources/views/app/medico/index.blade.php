<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pacientes</title>
</head>
<body>
    <a href="{{ route('medico.show', $medico->id) }}">Perfil</a>
    <a href="{{ route('login.logout', $medico->id) }}">Sair</a>
    <a href="{{ route('medico.gerarpdf') }}">Gerar Pdf</a>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>DATA CONSULTA</th>
                <th>STATUS</th>
                <th>DETALHES</th>
                <th>Dados Paciente</th>
                <th>OPÇÕES</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($consultas as $key => $consulta)
            <tr>
                <td>{{ ++$key }}</td>
                <td>{{ $consulta->data_consulta }}</td>
                <td>{{ $consulta->status }}</td>
                <td><a href="{{ route('consulta.show', $consulta->id) }}">ver mais</a></td>
                <td><a href="{{ route('paciente.show', $consulta->paciente_id) }}">ver mais</a></td>
                @if ($consulta->status === 'Exame')
                <td><a href="{{ route('prescricao.create', $consulta->id) }}">presc</a></td>
                @endif
                @if ($consulta->status === 'Marcada')
                <td><a href="{{ route('hconsulta.create', $consulta->id) }}">Hist</a></td>
                @endif
                @if ($consulta->status === 'Cancelada')
                <td><a href=""></a></td>
                @endif
            </tr>
            @empty
            <tr>
                <td>Não consulta marcada com você ainda.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    </table>

    <script>

    </script>
</body>
</html>
