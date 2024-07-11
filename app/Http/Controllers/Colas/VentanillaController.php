<?php

namespace App\Http\Controllers\Colas;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Ticket;
use Auth;

class VentanillaController extends Controller
{   
    public function index(Request $request){
            
        $user = Auth::user();

        if (!$user->ventanilla) {
            return "Sin Acceso. El usuario no tiene asignado una ventanilla.";
        }

        $ventanilla= $user->ventanilla;
        $ticket = Ticket::whereDate('created_at',date('Y-m-d'))->where('estado',0)->get();
        $tticket = $ticket->count();

        return view('colas.ventanillaindex',compact('tticket','ventanilla'));

        //$equiponombre = gethostbyaddr($_SERVER['REMOTE_ADDR']);
        
        ////if($equiponombre == "DESKTOP-POV2QSK" || $equiponombre == "DESKTOP-0H3NBK1"){
        // if($equiponombre == "adminer.test" || $equiponombre == "DESKTOP-0H3NBK1"){
        //     $ventanilla= $equiponombre == "adminer.test"? 1 : ($equiponombre == "DESKTOP-0H3NBK1" ? 2: null );
        //     $ticket = Ticket::whereDate('created_at',date('Y-m-d'))->where('estado',0)->get();
        //     $tticket = $ticket->count();
        //     return view('colas.ventanillaindex',compact('tticket','ventanilla'));
        // }else {
        //     return "Sin Acceso";
        // }
    }

    public function enespera(Request $request){
        $tticket = Ticket::whereDate('created_at',date('Y-m-d'))->where('estado',0)->count();
        //Logeado como ventanilla 2 
        $ticketAbiertos= Ticket::whereDate('updated_at',date('Y-m-d'))
        ->whereIn('estado',[1,2])
        ->where('ventanilla',$request->ventanilla)
        ->first();

        if($ticketAbiertos){
            $ticket=$ticketAbiertos;
            $tticket= 1;
        } else {
            $ticket = Ticket::whereDate('created_at',date('Y-m-d'))
            ->where('estado',0)
            ->orderBy('ticket','asc')
            ->first(); // todo el registro
            if ($ticket){
                $ticket->ventanilla=$request->ventanilla;
                $ticket->estado = 1;
                $ticket->save();
            }
            else $ticket=0;
        }
         
        // sólo el total


        return response()->json([$tticket, $ticket]);
    }

    public function enatencion(Request $request){
        $tticket = Ticket::whereDate('created_at',date('Y-m-d'))->where('estado',0)->count(); // sólo el total
        $ticket = Ticket::find($request->ide); // todo el registro
        $ticket->estado = 2;
        $ticket->save();
        return response()->json([$tticket, $ticket]);
    }

    public function encierre(Request $request){
        $tticket = Ticket::whereDate('created_at',date('Y-m-d'))->where('estado',0)->count(); // sólo el total
        $ticket = Ticket::find($request->ide); // todo el registro
        $ticket->estado = 3;
        $ticket->save();
        return response()->json([$tticket, $ticket]);
    }

    
}