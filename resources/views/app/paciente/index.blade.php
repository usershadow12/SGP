<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pacientes</title>
</head>
<body>
    <a href="{{ route('consulta.create') }}">Marcar Consulta</a>
    <a href="{{ route('consulta.show', 1) }}">Consulta Aberta</a>
    <a href="{{ route('consulta.show', 1)}}">Consulta Cancelada</a>
    <a href="{{ route('consulta.show', 1) }}">Consulta Fechada</a>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>DATA CONSULTA</th>
                <th>TIPO</th>
                <th>DETALHES</th>
                <th>Opções</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($consultas as $key => $consulta)
            <tr>
                <td>{{ ++$key }}</td>
                <td>{{ $consulta->data_consulta }}</td>
                <td>{{ $consulta->tipo }}</td>
                <td><a href="{{ route('consulta.show', $consulta->id) }}">ver mais</a></td>
                <td><a href="{{ route('consulta.edit', $consulta->id) }}">Editar</a></td>
                <td>
                    <form  method="POST" action="{{ route('consulta.destroy', $consulta->id) }}">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="Excluir Registro">
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td>Não marcou nehuma consulta ainda.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <script>

    </script>
</body>
</html>
