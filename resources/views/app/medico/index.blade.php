<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pacientes</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>DATA CONSULTA</th>
                <th>TIPO</th>
                <th>Paciente</th>
                <th>Opções</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($consultas as $key => $consulta)
            <tr>
                <td>{{ ++$key }}</td>
                <td>{{ $consulta->data_consulta }}</td>
                <td>{{ $consulta->tipo }}</td>
                <td>{{ $consulta->medico }}</td>
                <td><a href="{{ route('consulta.show', $consulta->paciente_id) }}">Editar</a></td>
                <td>
                    <form  method="POST" action="{{ route('consulta.destroy', $consulta->id) }}">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="Excluir Registro">
                    </form>
                </td>
            </tr>
            @empty
            <td>
                Nenhuma consulta marcada com você ainda.
            </td>
            @endforelse
        </tbody>
    </table>

    <script>

    </script>
</body>
</html>
