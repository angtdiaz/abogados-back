<?php

namespace App\Http\Controllers;

use App\Models\Abogados;
use App\Models\calificacion;
use App\Utils\Res;
use Illuminate\Http\Request;

class CalificacionController extends Controller
{
    public function getAll()
    {
        $calificaciones = calificacion::all();
        return Res::withData($calificaciones, "todas las calificaciones", 200);
    }
    public function getPorAbogado($abogado_id)
    {
        try {
            $abogado = Abogados::find($abogado_id);
            if (!$abogado) {
                return Res::withoutData("no se encontro", 404);
            }
            $calificaciones = $abogado->calificaciones;
            return Res::withData($calificaciones, "calificaciones", 200);
        } catch (\Throwable $th) {
            error_log($th);
            return Res::withoutData("Error", 400);
        }
    }
    public function create(Request $request)
    {
        try {
            $calificacion = calificacion::create($request->all());
            return Res::withData($calificacion, "calificacion", 200);
        } catch (\Throwable $th) {
            error_log($th);
            return Res::withoutData("Error", 400);
        }
    }
}
