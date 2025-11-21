<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ticket de compra</title>
    <style>
        body {
            font-family: 'Courier New', monospace;
            font-size: 13px;
            color: #000;
            margin: 0;
            padding: 0;
        }
        .ticket {
            width: 280px;
            padding: 10px;
            margin: auto;
            border: 1px dashed #000;
        }
        h2, h3, p {
            text-align: center;
            margin: 2px 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 6px;
        }
        th, td {
            text-align: left;
            padding: 3px 0;
        }
        th {
            border-bottom: 1px dashed #000;
        }
        .right {
            text-align: right;
        }
        .total-section {
            margin-top: 10px;
            border-top: 1px dashed #000;
            padding-top: 5px;
        }
        .highlight {
            font-weight: bold;
            font-size: 14px;
        }
        .footer {
            text-align: center;
            font-size: 12px;
            margin-top: 8px;
            border-top: 1px dashed #000;
            padding-top: 5px;
        }
    </style>
</head>
<body>
    <div class="ticket">
        <h2>HAMBURGUESERÍA</h2>
        <h3>Ticket de compra</h3>
        <p><strong>Fecha:</strong> {{ $fecha }}</p>
        <p><strong>Cliente:</strong> {{ $usuario }}</p>
        <p><strong>Folio:</strong> #{{ $id_venta }}</p>

        <table>
            <thead>
                <tr>
                    <th>Producto</th>
                    <th class="right">Precio</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($carrito as $item)
                    <tr>
                        <td>{{ $item['nombre'] }}</td>
                        <td class="right">${{ number_format($item['precio'], 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="total-section">
            <table>
                <p><strong>Subtotal:</strong> ${{ number_format($subtotal, 2) }}</p>
                <p><strong>IVA (16%):</strong> ${{ number_format($iva, 2) }}</p>
                <p><strong>Total:</strong> ${{ number_format($total, 2) }}</p>
            </table>
        </div>

        <div class="footer">
            <p>Gracias por tu compra</p>
            <p>¡Vuelve pronto!</p>
        </div>
    </div>
</body>
</html>
