<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Especialidad extends Model
{
    use HasFactory;
    protected $table = "especialidad";

    protected $fillable = [
        "especialidad", "abogado_id"
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    //relaciones
    public function abogado()
    {
        return $this->belongsTo(Abogados::class, "abogado_id");
    }
}
