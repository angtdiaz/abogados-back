<?php

namespace App\Http\Controllers;

use App\Models\Abogados;
use App\Models\Especialidad;
use App\Utils\Res;
use Illuminate\Http\Request;

class EspecialidadController extends Controller
{
    public function getPorEspecialidad(Request $request)
    {
        try {
            $especialidad = $request->query("nombre");
            $especialidades = Abogados::whereRelation("especialidades", "especialidad", $especialidad)->get();
            return Res::withData($especialidades, $especialidad, 200);
        } catch (\Throwable $th) {
            error_log($th);
            return Res::withoutData("Error", 400);
        }
    }
    public function getEspecialidades()
    {
        try {
            $especialidades = Especialidad::select("especialidad")->groupBy("especialidad")->get();
            $especialidadesArr = [];
            foreach ($especialidades as $e) {
                $especialidadesArr[] = $e["especialidad"];
            }
            return Res::withData($especialidadesArr, "especialidades", 200);
        } catch (\Throwable $th) {
            error_log($th);
            return Res::withoutData("Error", 400);
        }
    }
}
