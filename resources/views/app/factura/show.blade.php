<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>Gerado em: {{ $factura->data }}</p>
    <p>Valor a Pagar: {{ $factura->total }}</p>
    <p>Iban: {{ $factura->iban }}</p>
    <p>Staus: {{ $factura->status }}</p>
    <a href="{{ route('back') }}">Voltar</a>
</body>
</html>
