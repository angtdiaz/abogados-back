<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Abogados extends Model
{
    use HasFactory;
    protected $table = "abogados";

    protected $fillable = [
        "nombre", "apellido", "ciudad", "telefono", "correo"
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',

    ];

    protected $with = ["especialidades"];
    //relaciones

    public function especialidades()
    {
        return $this->hasMany(Especialidad::class, "abogado_id");
    }
    public function calificaciones()
    {
        return $this->hasMany(calificacion::class, "abogado_id");
    }
    public function citas()
    {
        return $this->hasMany(Cita::class, "abogado_id");
    }
}
