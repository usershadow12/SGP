<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pacientes</title>
</head>
<body>
    <a href="{{ route('pacientes.create') }}">Cadastrar Paciente</a>
    <table>
        <thead>
            <th>
                <td>#</td>
                <td>Nome</td>
                <td>Sobrenome</td>
                <td>Morada</td>
                <td>Opções</td>
            </th>
        </thead>
        <tbody>
            @forelse ($pacientes as $key => $paciente)
            <tr>
                <td>{{ ++$key }}</td>
                <td>{{ $paciente->nome }}</td>
                <td>{{ $paciente->sobrenome }}</td>
                <td>{{ $paciente->morada }}</td>
                <td><a href="{{ route('pacientes.edit', $paciente->id) }}">Editar</a></td>
                <td><a href="javascript:void()" onclick="document.getElementById('#apagarPaciente').submit()">Deletar</a></td>
                <form id="apagarPaciente" method="POST" action="{{ route('pacientes.destroy', $paciente->id) }}">
                    @csrf
                    @method('DELETE')
                </form>
            </tr>
            @empty
            <tr>
                <td>Não foram cadastrados pacientes ainda.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <script>

    </script>
</body>
</html>
