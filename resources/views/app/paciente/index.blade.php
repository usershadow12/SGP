<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pacientes</title>
</head>
<body>
    <a href="{{ route('consulta.create') }}">Marcar Consulta</a>
    <a href="{{ route('paciente.show', $paciente->id) }}">Perfil</a>
    <a href="{{ route('gerarpdf') }}">Gerar Pdf</a>
    <a href="{{ route('login.logout', $paciente->id) }}">Sair</a>
    <form action="{{ route('consulta.buscar1') }}" method="POST">
        @csrf
        <label>Nome do Medico</label>
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
                @if ($consulta->status === 'Exame')
                    <td><a href="{{ route('resultado.create', $consulta->id) }}">enviar exame</a></td>
                @endif
                @if ($consulta->status === 'Marcada')
                    <!--<td><a href="{{ route('consulta.edit', $consulta->id) }}">Editar</a></td>-->
                    <td><form action="{{ route('consulta.cancelar', $consulta->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="status" value="Cancelada">
                        <input type="submit" value="Cancelar Consulta">
                    </form></td>
                @endif
            </tr>
            @empty
            <tr>
                <td>Não marcou nehuma consulta ainda.</td>
            </tr>
            @endforelse
        </tbody>
</body>
</html>
