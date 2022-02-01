<?php

namespace App\Http\Controllers;

use App\Models\Abogados;
use App\Models\Especialidad;
use App\Utils\Res;
use Illuminate\Http\Request;

class AbogadosController extends Controller
{
    public function getAll()
    {
        $abogados = Abogados::all();
        return Res::withData($abogados, "abogados", 200);
    }
    public function create(Request $request)
    {
        try {
            $abogado = Abogados::create($request->all());
            $abogado->especialidades()->createMany($request->especialidades);
            return Res::withData($abogado, "abogado creado con exito", 200);
        } catch (\Throwable $th) {
            error_log($th);
            return Res::withoutData("Error", 400);
        }
    }
    public function update(Request $request, $abogado_id)
    {
        try {
            $abogado = Abogados::find($abogado_id);
            if (!$abogado) {
                return Res::withoutData("No se encontro", 404);
            }
            $abogado->update($request->all());
            return Res::withData($abogado, "Modificado", 200);
        } catch (\Throwable $th) {
            error_log($th);
            return Res::withoutData("Error", 400);
        }
    }
    public function delete($abogado_id)
    {
        try {
            $abogado = Abogados::find($abogado_id);
            if (!$abogado) {
                return Res::withoutData("No se encontro", 404);
            }
            $abogado->delete();
            return Res::withoutData("Borrado", 200);
        } catch (\Throwable $th) {
            error_log($th);
            return Res::withoutData("Error", 400);
        }
    }
    public function getCiudades()
    {
        try {
            $ciudades = Abogados::select("ciudad")->groupBy("ciudad")->get();
            $ciudadesArr = [];
            foreach ($ciudades as $e) {
                $ciudadesArr[] = $e["ciudad"];
            }
            return Res::withData($ciudadesArr, "ciudades", 200);
        } catch (\Throwable $th) {
            error_log($th);
            return Res::withoutData("Error", 400);
        }
    }
}
