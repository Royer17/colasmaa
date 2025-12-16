<?php

namespace App\Http\Controllers\Colasv2;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Ticket;
use App\CityCouncil;
use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\PrintConnectors\FilePrintConnector; // Alternativa para Linux/USB

class TicketController extends Controller
{
    public function index(Request $request){
        //areas
        $offices = CityCouncil::wherePublished(1)
            ->orderBy('position', 'asc')
            ->get(['id', 'name', 'icon']);

        return view('colasv2.landing.ticketing', compact('offices'));
    }

    public function create(Request $request){

        $office = CityCouncil::find($request->type);

        if (!$office) {
            throw new \Exception("No existe la oficina seleccionada.", 1);
        }

        if (!$office->email) {
            throw new \Exception("La oficina seleccionada no tiene asignado un código.", 1);
        }

        $office_code = $office->email;

        $hoy = date("Y-m-d");

        $nticket = 1;

        $tickets = Ticket::whereDate('created_at',$hoy)
            ->whereOfficeId($office->id)
            ->get();

        $maxticket = $tickets->max('ticket');
        if (count($tickets)>0)
            $nticket = $maxticket + 1;

        $nticket_len = strlen($nticket);
        $nticket_len_default = 4;

        $nticket_zeros_missing = $nticket_len_default - $nticket_len;
        
        $ticket = new Ticket;
        $ticket->ticket = $nticket;
        $ticket->code = $office_code.str_repeat("0", $nticket_zeros_missing).$nticket;
        $ticket->dni = '########';
        $ticket->office_id = $office->id;
        $ticket->estado = 0;
        $ticket->type = "Regular";
        $ticket->ventanilla_id = "";
        //0 = EN ESPERA
        //1 = LLAMANDO USUARIO
        //2 = EN ATENCION
        //3 = FINALIZO ATENCION
        //4 = NO SE PRESENTO
        $ticket->save();

        $this->imprimirTicket($office->name, $ticket->code);

        return response()->json([
            'ticketNumber' => $ticket->code,
            'estimatedTime' => '15',
            'message' => 'Ticket creado correctamente',
            'symbol' => 'success'
        ]);
    }

    private function imprimirTicket($oficina, $numero)
{
    try {
        // Para Windows (conectada por USB y compartida como "POS58")
        $connector = new WindowsPrintConnector("smb://" . env('PRINTER_HOST') . "/" . env('PRINTER_NAME'));
        // O si está directamente en el puerto LPT (muy raro hoy en día)
        // $connector = new WindowsPrintConnector("LPT1");

        // Para Linux/USB (requiere configuración adicional de permisos y rutas)
        // $connector = new FilePrintConnector("/dev/usb/lp0"); 

        $printer = new Printer($connector);

        // Personaliza el contenido del ticket
        $printer->setJustification(Printer::JUSTIFY_CENTER);
        $printer->setTextSize(2, 2); // Texto grande
        $printer->text("$oficina\n");
        $printer->setTextSize(1, 1); // Texto normal
        $printer->text("Su numero es:\n");
        $printer->setTextSize(4, 4); // Texto gigante para el numero
        $printer->text($numero . "\n");
        $printer->setTextSize(1, 1);
        $printer->text("Por favor espere su turno.\n");
        $printer->text(date('Y-m-d H:i:s') . "\n");
        $printer->feed(4); // Alimentar 4 líneas
        $printer->cut(); // Cortar el papel
        $printer->close();

    } catch (\Exception $e) {
        \Log::error("Error al imprimir el ticket: " . $e->getMessage());
        // Maneja la excepción si la impresora no está disponible
    }
}

}
