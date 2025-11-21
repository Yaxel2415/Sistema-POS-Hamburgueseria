<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class TicketController extends Controller
{
    public function generarTicket()
    {
        // 🔹 OBTENER DATOS DE LA ÚLTIMA VENTA DESDE LA SESIÓN
        $ticketData = session('ticket_data');

        if (!$ticketData) {
            return redirect()->route('menu')
                ->with('error', 'No hay datos de venta para generar el ticket.');
        }

        // 🔹 DATOS DEL TICKET (calculados igual que en historial)
$subtotal = array_sum(array_map(fn($item) => $item['precio'] * $item['cantidad'], $ticketData['carrito']));
$iva = $subtotal * 0.16;
$total = $subtotal + $iva;

$data = [
    'usuario'   => $ticketData['usuario'],
    'fecha'     => $ticketData['fecha'],
    'carrito'   => $ticketData['carrito'],
    'subtotal'  => $subtotal,
    'iva'       => $iva,
    'total'     => $total,
    'id_venta'  => $ticketData['id_venta'],
];


        // 🔹 LIMPIAR LOS DATOS DE LA SESIÓN (para evitar duplicados)
        session()->forget('ticket_data');

        // 🔹 GENERAR PDF USANDO LA VISTA 'ticket.pdf'
        $pdf = PDF::loadView('ticket.pdf', $data)
            ->setPaper([0, 0, 300, 600], 'portrait'); // tamaño similar a ticket

        // 🔹 DESCARGA AUTOMÁTICA DEL ARCHIVO
        return $pdf->download('Ticket_' . $ticketData['id_venta'] . '.pdf');
    }
}
