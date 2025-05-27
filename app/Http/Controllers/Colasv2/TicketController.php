<?php

namespace App\Http\Controllers\Colasv2;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Ticket;
use App\CityCouncil;

class TicketController extends Controller
{
    public function index(Request $request){
        //areas
        $offices = CityCouncil::wherePublished(1)
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
        $ticket->ventanilla = "";
        //0 = EN ESPERA
        //1 = LLAMANDO USUARIO
        //2 = EN ATENCION
        //3 = FINALIZO ATENCION
        //4 = NO SE PRESENTO
        $ticket->save();

        return response()->json([
            'ticketNumber' => $ticket->code,
            'estimatedTime' => '15',
            'message' => 'Ticket creado correctamente',
            'symbol' => 'success'
        ]);
        //return view('colasv2.ticketeraimpresion',compact('ticket'));
    }
}
