<?php

namespace App\Http\Controllers\Colas;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Ticket;
use App\CityCouncil;

class TicketController extends Controller
{
    public function index(Request $request){
        //areas
        $offices = CityCouncil::wherePublished(1)
            ->get(['id', 'name']);

        return view('colas.ticketeraindex', compact('offices'));
    }

    public function create(Request $request){
        $hoy = date("Y-m-d");
        $nticket = 1;
        $tickets = Ticket::whereDate('created_at',$hoy)->get();
        $maxticket = $tickets->max('ticket');
        if (count($tickets)>0)
            $nticket = $maxticket + 1;
        $ticket = new Ticket;
        $ticket->ticket = $nticket;
        $ticket->dni = $request->dni;
        $ticket->office_id = $request->office_id;
        $ticket->estado = 0;
        $ticket->ventanilla = "";
        //0 = EN ESPERA
        //1 = LLAMANDO USUARIO
        //2 = EN ATENCION
        //3 = FINALIZO ATENCION
        //4 = NO SE PRESENTO
        $ticket->save();

        return view('colas.ticketeraimpresion',compact('ticket'));
    }
}
