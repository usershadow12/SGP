<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dados</title>
</head>
<body>
    <form method="POST" action="{{ route('consulta.store') }}">
        @csrf
        <div>
            <label for="">Data da Marcação</label>
            <input type="datetime-local" disabled value="{{ $consulta->data_marcacao }}">
        </div>
        <div>
            <label for="">Data da Consulta</label>
            <input type="datetime" disabled value="{{ $consulta->data_consulta }}">
        </div>
        <div>
            <label for="">Hora da Consulta</label>
            <input type="time" disabled value="{{ $consulta->hora_consulta }}">
        </div>
        <div>
            <label for="">Tipo de Consulta</label>
            <input type="text" disabled value="{{ $consulta->tipo }}">
        </div>
        <div>
            <label for="">Médico</label>
            <input type="text" disabled value="{{ $consulta->medico }}">
        </div>
        <div>
            <label for="">Status</label>
            <input type="text" disabled value="{{ $consulta->status }}">
        </div>
    </form>
    @if ($consulta->status === 'Concluida')
        <a href="{{ route('factura.show', $consulta->id) }}">Ver Factura<a>
        <a href="{{ route('hconsulta.show', $consulta->id) }}">Ver Histórico<a>
        <a href="{{ route('resultado.show', $consulta->id) }}">ver exame<a>
        <a href="{{ route('prescricao.show', $consulta->id) }}">Ver Prescricao<a>
        <a href="{{ route('comprovativo.show', $consulta->id) }}">Ver Comprovativo<a>
    @endif
    @if ($consulta->status === 'Feito')
    <a href="{{ route('hconsulta.show', $consulta->id) }}">Ver Histórico<a>
    <a href="{{ route('resultado.show', $consulta->id) }}">Ver Exame<a>
    <a href="{{ route('factura.show', $consulta->id) }}">Ver Factura<a>
    <a href="{{ route('comprovativo.show', $consulta->id) }}">Ver Comprovativo<a>
    @endif
    @if ($consulta->status === 'Exame')
        <a href="{{ route('hconsulta.show', $consulta->id) }}">Ver Histórico<a>
        <a href="{{ route('resultado.create', $consulta->id) }}">enviar Exame<a>
        <a href="{{ route('factura.show', $consulta->id) }}">Ver Factura<a>
            <a href="{{ route('comprovativo.show', $consulta->id) }}">Ver Comprovativo<a>
    @endif
    @if ($consulta->status === 'Aberta')
        <a href="{{ route('factura.show', $consulta->id) }}">Ver Factura<a>
        <a href="{{ route('comprovativo.show', $consulta->id) }}">Ver Comprovativo<a>
    @endif
    @if ($consulta->status === 'Marcada')
    <a href="{{ route('factura.show', $consulta->id) }}">Ver Factura<a>
        <form action="{{ route('consulta.cancelar', $consulta->id) }}" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" name="status" value="Cancelada">
            <input type="submit" value="Cancelar Consulta">
        </form>
        <!--<a href="{{ route('consulta.edit', $consulta->id) }}">Remarcar Consulta<a>-->
        <a href="{{ route('comprovativo.create', $consulta->id) }}">Enviar Comprovativo<a>
    @endif
    @if ($consulta->status === 'Cancelada')
        <a href="{{ route('consulta.edit', $consulta->id) }}">Remarcar Consulta<a>
    @endif

    <a href="{{ route('back') }}">Voltar</a>
</body>
</html>
