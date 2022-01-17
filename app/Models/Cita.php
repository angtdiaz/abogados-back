<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    use HasFactory;

    protected $table = "citas";

    protected $fillable = [
        "fecha", "status", "hora", "abogado_id", "usuario_id"
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, "usuario_id");
    }
    public function abogado()
    {
        return $this->belongsTo(Abogados::class, "abogado_id");
    }
}
