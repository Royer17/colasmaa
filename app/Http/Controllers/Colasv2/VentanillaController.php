<?php

namespace App\Http\Controllers\Colasv2;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Ticket;
use App\CityCouncil;
use Auth;
use App\Commission;
use DB;

class VentanillaController extends Controller
{   
    public function index(Request $request){
            
        $user = Auth::user();
        $user_name = $user->name;

        if (!$user->office_id) {
            return "Sin Acceso. El usuario no tiene asignado una oficina.";
        }

        if (!$user->ventanilla) {
            return "Sin Acceso. El usuario no tiene asignado una ventanilla.";
        }

        $office_id = $user->office_id;
        $ventanilla = $user->ventanilla;

        $office = CityCouncil::with('commission')->find($office_id);

        $ventanilla_name = $office->commission->title;

        $ticket = Ticket::whereDate('created_at',date('Y-m-d'))
            ->where('estado',0)
            ->whereOfficeId($office_id)
            ->get();
        $tticket = $ticket->count();

        $office_name = $office->name;

        return view('colasv2.panel.index', compact('tticket', 'office_name', 'ventanilla_name', 'user_name'));

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
        $user = Auth::user();
        $office_id = $user->office_id;

        $tickets_waiting = Ticket::whereDate('created_at',date('Y-m-d'))
            ->where('estado',0)
            ->whereOfficeId($office_id)
            ->get(['id', 'code', 'type', 'created_at as arrivalTime']);

        return response()->json([
            'tickets_waiting' => $tickets_waiting
        ]);
    }

    public function current_ticket(Request $request){
        $user = Auth::user();
        $office_id = $user->office_id;
        $office = CityCouncil::with('commission')->find($office_id);

        $ventanilla= $office->commission->title;

        //ticket llamado
        $ticket = Ticket::whereDate('created_at',date('Y-m-d'))
            ->where('estado',1)
            ->whereOfficeId($office_id)
            ->where('ventanilla',$ventanilla)
            ->select('id', 'code', 'type', 'created_at as arrivalTime', 'estado as status')
            ->first();

        if(!$ticket){
            //ticket siento atendido
            $ticket = Ticket::whereDate('created_at',date('Y-m-d'))
                ->where('estado',2)
                ->whereOfficeId($office_id)
                ->select('id', 'code', 'type', 'created_at as arrivalTime', 'estado as status')
                ->first();
        }

        return response()->json([
            'ticket' => $ticket
        ]);
    }

    public function llamar_ticket(Request $request){

        try {

            DB::beginTransaction();
            $ticket_id = $request->ticket_id;

            $user = Auth::user();

            $ticket = Ticket::find($ticket_id);
            $ticket->estado = 1;
            $ticket->ventanilla = $user->ventanilla;
            $ticket->save();

            DB::commit();
            return response()->json($ticket);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json($th);
        }
    }

    public function siguiente_ticket(Request $request){
        try {
            $user = Auth::user();
            $office_id = $user->office_id;

            $office = CityCouncil::with('commission')
                ->find($office_id);

            $ticket = Ticket::whereDate('created_at',date('Y-m-d'))
                ->where('estado',0)
                ->whereOfficeId($office_id)
                ->orderBy('ticket','asc')
                ->select('id', 'code', 'type', 'created_at as arrivalTime', 'estado as status')
                ->first();

            if(!$ticket){
                return response()->json([
                    'ticket' => null,
                    'message' => 'No hay tickets disponibles'
                ], 400);
            }

            DB::beginTransaction();

            $ticket->estado = 1;
            $ticket->ventanilla = $office->commission->title;
            $ticket->save();

            DB::commit();

            return response()->json([
                'ticket' => $ticket,
                'message' => 'Ticket llamado correctamente'
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                'ticket' => null,
                'message' => 'Error al obtener el siguiente ticket. Intente nuevamente.'
            ], 400);
        }
    }

    public function atender_ticket(Request $request){
        try {
            DB::beginTransaction();
            $ticket_id = $request->ticket_id;

            $ticket = Ticket::find($ticket_id);

            $ticket->estado = 2;
            $ticket->save();

            DB::commit();
            return response()->json(['ticket' => $ticket, 'message' => 'Ticket atendido correctamente']);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['ticket' => null, 'message' => 'Error al atender el ticket. Intente nuevamente.']);
        }
    }

    public function terminar_ticket(Request $request){
        try {
            DB::beginTransaction();
            $ticket_id = $request->ticket_id;

            $ticket = Ticket::find($ticket_id);
            $ticket->estado = 3;
            $ticket->save();

            DB::commit();
            return response()->json([
                'ticket' => $ticket,
                'message' => 'Ticket terminado correctamente'
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                'ticket' => null,
                'message' => 'Error al terminar el ticket. Intente nuevamente.'
            ]);
        }
    }

    public function llamar(Request $request){
        
        $user = Auth::user();
        $office_id = $user->office_id;
        $ventanilla= $user->ventanilla;

        $tticket = Ticket::whereDate('created_at',date('Y-m-d'))
            ->where('estado',0)
            ->whereOfficeId($office_id)
            ->count();

        $tickets_waiting = Ticket::whereDate('created_at',date('Y-m-d'))
            ->where('estado',0)
            ->whereOfficeId($office_id)
            ->get(['id', 'code']);

        //Logeado como ventanilla 2 
        $ticketAbiertos= Ticket::whereDate('updated_at',date('Y-m-d'))
            ->whereIn('estado',[1,2])
            ->where('ventanilla',$request->ventanilla)
            ->whereOfficeId($office_id)
            ->first();

        if($ticketAbiertos){
            $ticket=$ticketAbiertos;
            //$tticket= 1;
        } else {
            $ticket = Ticket::whereDate('created_at',date('Y-m-d'))
                ->where('estado',0)
                ->orderBy('ticket','asc')
                ->whereOfficeId($office_id)
                ->first(); // todo el registro

            if ($ticket){
                //$ticket->ventanilla=$request->ventanilla;
                $ticket->ventanilla=$ventanilla;
                $ticket->estado = 1;
                $ticket->save();
            }
            else $ticket=0;
        }
         
        // sólo el total
        return response()->json([
            'queue' => $tticket,
            'ticket' => $ticket,
            'tickets_waiting' => $tickets_waiting
        ]);
    }

    public function enatencion(Request $request){

        $user = Auth::user();
        $office_id = $user->office_id;

        $tticket = Ticket::whereDate('created_at',date('Y-m-d'))
            ->where('estado',0)
            ->whereOfficeId($office_id)
            ->count(); // sólo el total

        $ticket = Ticket::find($request->ide); // todo el registro
        $ticket->estado = 2;
        $ticket->save();
        return response()->json([$tticket, $ticket]);
    }

    public function encierre(Request $request){
        $user = Auth::user();
        $office_id = $user->office_id;

        $tticket = Ticket::whereDate('created_at',date('Y-m-d'))
            ->where('estado',0)
            ->whereOfficeId($office_id)
            ->count(); // sólo el total

        $ticket = Ticket::find($request->ide); // todo el registro
        $ticket->estado = 3;
        $ticket->save();
        return response()->json([$tticket, $ticket]);
    }

    
}