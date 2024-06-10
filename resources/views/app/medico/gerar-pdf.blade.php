<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    h2{
        text-align: center;
    }
    table {
  border-collapse: collapse;
  width: 100%;
}

table, th, td {
  border: 1px solid black;
}

th, td {
  padding: 8px;
  text-align: left;
}
thead {
  background-color: #ccc;
}

tr:nth-child(even) {
  background-color: #f2f2f2;
}
</style>
<body>
    <h2>Lista de Consultas</h2>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Data</th>
                <th>Hora</th>
                <th>Paciente</th>
                <th>contacto</th>
                <th>contacto</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($consultas as $key => $consulta)
            <tr>
                <td>{{ ++$key }}</td>
                <td>{{ $consulta->data_consulta }}</td>
                <td>{{ $consulta->hora_consulta }}</td>
                <td>{{ $consulta->nome . " " . $consulta->sobrenome}}</td>
                <td>{{ $consulta->contacto1}}</td>
                <td>{{ $consulta->contacto2}}</td>
                <td>{{ $consulta->status }}</td>
            </tr>
            @empty
            <tr>
                <td>Nenhum Registro.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
