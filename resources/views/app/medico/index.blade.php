<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medico</title>
</head>
<body>
    <a href="{{ route('medico.show', $medico->id) }}">Perfil</a>
    <a href="{{ route('login.logout', $medico->id) }}">Sair</a>
    <a href="{{ route('medico.gerarpdf') }}">Gerar Pdf</a>
    <form action="{{ route('consulta.buscar') }}" method="POST">
        @csrf
        <label>Nome Paciente</label>
        <input type="text" name="nome">
        <label for="">Estado da Consulta</label>
            <select name="status" id="">
                <option value=""></option>
                <option value="Marcada">Marcada</option>
                <option value="Aberta">Aberta</option>
                <option value="Exame">Exame</option>
                <option value="Feito">Feito</option>
                <option value="Concluida">Concluida</option>
                <option value="Cancelada">Cancelada</option>
            </select>
        <fieldset>
            <label for="">De</label>
            <input type="date" name="inicio">
            <label for="">Até</label>
            <input type="date" name="fim">
        </fieldset>
        <input type="submit"  value="Pesquisar">
    </form>
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
                @if ($consulta->status === 'Feito')
                <td><a href="{{ route('prescricao.create', $consulta->id) }}">presc</a></td>
                @endif
                @if ($consulta->status === 'Aberta')
                <td><a href="{{ route('hconsulta.create', $consulta->id) }}">Hist</a></td>
                @endif
                @if ($consulta->status === 'Cancelada')
                <td><a href=""></a></td>
                @endif
            </tr>
            @empty
            <tr>
                <td>Nenhum Registro Encontrado.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
