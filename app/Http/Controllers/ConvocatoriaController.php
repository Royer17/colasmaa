<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use DB;
use Jenssegers\Date\Date;

class ConvocatoriaController extends Controller
{

    public function datatable()
    {
        $result = DB::table('mw_convoca')
            ->select('referencia', 'unidad', 'fecha', 'bases', 'aptos', 'resultados', 'idnoti')
            ->where('deleted_at', NULL)
            ->wherePublished(1)
            ->orderBy('fecha','DESC');

        return DataTables::of($result)
        ->escapeColumns('Image')
        ->addColumn('Image', function($model)
        {
            return Date::parse($model->fecha)->format('d\/F\/Y');
            // return $this->getOneImage($model->id,3,1);
        })
        ->make();
    }


}
