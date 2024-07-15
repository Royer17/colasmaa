<?php
namespace App\Http\Controllers\Colas;

use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Ticket;
use App\Youtube;


class MonitorController extends Controller
{
    public function index(Request $request){

        $videos = Youtube::where('published', 1)
            ->where('foto', '!=', '')
            ->get(['id', 'foto']);

        return view('colas.monitorindex', compact('videos'));
    }

    public function carga(Request $request){
        $ticket = Ticket::select('ticket','estado','ventanilla')->whereDate('created_at',date('Y-m-d'))
        ->whereIn('estado',[1,2])
        ->orderBy('ticket','asc')
        ->limit(2)->get()->toArray();
        return response()->json([$ticket]);
    }

    public function verificar(Request $request){        
        while (true) {
            $notification = Cache::get('notification');

            if ($notification) {
                Cache::forget('notification'); 
                return response()->json(['notification' => $notification]);
            }

            sleep(1); 
        }
       
    }  
}     

        // $fecha_ac = isset($_POST['created_at']) ? $_POST['created_at']:0;

        // $fecha_bd = 0;

        // while( $fecha_bd <= $fecha_ac )
        //     {	
        //         $created_at    = Ticket::whereIn('estado',[1,2])
        //         ->orderBy('created_at','asc')
        //         ->limit(1)
        //         ->
        //         ;
                
        //         usleep(100000);//anteriormente 10000
        //         clearstatcache();
        //         $fecha_bd  = strtotime($created_at);
        //     }

        // $query       = "SELECT * FROM mensajes ORDER BY timestamp DESC LIMIT 1";
        // $datos_query = mysql_query($query);
        // while($row = mysql_fetch_array($datos_query))
        // {
        //     $ar["timestamp"]          = strtotime($row['timestamp']);	
        //     $ar["mensaje"] 	 		  = $row['mensaje'];	
        //     $ar["id"] 		          = $row['id'];	
        //     $ar["status"]           = $row['status'];	
        //     $ar["tipo"]           = $row['tipo'];	
        // }
        // $dato_json   = json_encode($ar);
        // echo $dato_json;
  

