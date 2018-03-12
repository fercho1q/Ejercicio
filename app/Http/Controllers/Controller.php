<?php

namespace App\Http\Controllers;

use App\Piloto;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Response;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\View;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        return View::make('puntos.index', [

        ]);
    }

    public function getPilotoList()
    {
        $pilotos = Piloto::select('pilotos.*','escuderias.nombre as escuderia')
            ->join('escuderias', 'pilotos.escuderia_id', '=', 'escuderias.id')
            ->where('pilotos.estado', '=', 'ACTIVO')->orderBy('puntos', 'DESC')->get();
        $view = View::make('puntos.loads.pilotos_list', [
            'items' => $pilotos,
            'columns' => [
                ['name' => 'Escuderia', 'db_column' => 'escuderia'],
                ['name' => 'Puntos', 'db_column' => 'puntos'],
            ],
        ])->render();

        return Response::json(array(
            'html' => $view
        ));
    }

    public function sumPunto($id)
    {
        $piloto = Piloto::findOrFail($id);
        $piloto->puntos += 1;
        if ($piloto->save()) {
            return Response::json(true);
        } else {
            return Response::json(false);
        }
    }
}
