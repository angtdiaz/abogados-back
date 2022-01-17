<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class calificacion extends Model
{
    use HasFactory;
    protected $table = "calificacion";

    protected $fillable = [
        "calificacion", "usuario_id", "comentario", "abogado_id"
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',

    ];
    protected $with = ["usuario"];
    //relaciones
    public function abogado()
    {
        return $this->belongsTo(Abogados::class, "abogado_id");
    }
    public function usuario()
    {
        return $this->belongsTo(User::class, "usuario_id");
    }
}
