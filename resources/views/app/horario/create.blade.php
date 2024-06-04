<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Definir Horário de Trabalho</title>
</head>
<body>
    <form method="POST" action="{{ route('horario.store') }}">
        @csrf
        <div>
            <label>Dia1</label>
            <select name="dia1" id="">
                <option value="1">Domingo</option>
                <option value="2">Segunda-Feira</option>
                <option value="3">Terça-Feira</option>
                <option value="4">Quarta-Feira</option>
                <option value="5">Quinta-Feira</option>
                <option value="6">Sexta-Feira</option>
                <option value="7">Sábado</option>
            </select>
            <label>inicio</label>
            <input type="time" name="inicio1">
        </div>
        <div>
            <label>Dia2</label>
            <select name="dia2" id="">
                <option value="1">Domingo</option>
                <option value="2">Segunda-Feira</option>
                <option value="3">Terça-Feira</option>
                <option value="4">Quarta-Feira</option>
                <option value="5">Quinta-Feira</option>
                <option value="6">Sexta-Feira</option>
                <option value="7">Sábado</option>
            </select>
            <label>inicio</label>
            <input type="time" name="inicio2">
        </div>
        <div>
            <label>Dia3</label>
            <select name="dia3" id="">
                <option value="1">Domingo</option>
                <option value="2">Segunda-Feira</option>
                <option value="3">Terça-Feira</option>
                <option value="4">Quarta-Feira</option>
                <option value="5">Quinta-Feira</option>
                <option value="6">Sexta-Feira</option>
                <option value="7">Sábado</option>
            </select>
            <label>inicio</label>
            <input type="time" name="inicio3">
        </div>

        <input type="submit" value="ok">
    </form>
</body>
</html>
