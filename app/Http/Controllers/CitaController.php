<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\User;
use App\Utils\Res;
use Illuminate\Http\Request;

class CitaController extends Controller
{
    public function getAll($usuario_id)
    {
        $user = User::find($usuario_id);
        if ($user) {
            $citas = $user->citas;
            return Res::withData($citas, "citas", 200);
        }
        return Res::withData([], "citas", 200);
    }
    public function create(Request $request)
    {
        try {
            $fechaHora = $request->only(['fecha', 'hora']);
            $citasValidate = Cita::where("fecha", $fechaHora["fecha"])->where("hora", $fechaHora["hora"])->where("abogado_id", $request->abogado_id)->get();
            if (count($citasValidate) > 0) {
                return Res::withoutData("Horario no disponible", 404);
            }
            $cita = Cita::create($request->all());
            return Res::withData($cita, "cita creada", 200);
        } catch (\Throwable $th) {
            error_log($th);
            return Res::withoutData("Error", 400);
        }
    }
    public function eliminar($cita_id)
    {
        try {
            $cita = Cita::find($cita_id);
            if ($cita) {
                $cita->delete();
                return Res::withoutData("cita borrada", 200);
            }
        } catch (\Throwable $th) {
            error_log($th);
            return Res::withoutData("cita no borrada", 200);
        }
    }
}
