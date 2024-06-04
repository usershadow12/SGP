<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pacientes</title>
</head>
<body>
    <a name="marcar" href="{{ route('consulta.create') }}">Marcar Consulta</a>
    <a href="{{ route('consulta.show', $consulta) }}">Consulta Aberta</a>
    <a href="{{ route('consultashow', $consulta) }}">Consulta Cancelada</a>
    <a href="{{ route('consultashow', $consulta) }}">Consulta Fechada</a>
    <table>
        <thead>
            <th>
                <td>#</td>
                <td>DATA CONSULTA</td>
                <td>TIPO</td>
                <td>MEDICO</td>
                <td>Opções</td>
            </th>
        </thead>
        <tbody>
            @forelse ($consultas as $key => $consulta)
            <tr>
                <td>{{ ++$key }}</td>
                <td>{{ $consulta->data_consulta }}</td>
                <td>{{ $consulta->tipo }}</td>
                <td>{{ $consulta->medico }}</td>
                <td><a href="{{ route('consulta.edit', $paciente->id) }}">Editar</a></td>
                <td>
                    <form  method="POST" action="{{ route('consulta.destroy', $paciente->id) }}">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="Excluir Registro">
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td>Não foram cadastrados pacientes ainda.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
