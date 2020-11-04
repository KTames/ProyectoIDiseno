<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NivelJerarquico extends Model
{
    use HasFactory;
    protected $table = "niveles_jerarquicos";
    protected $primaryKey = "componente_id";

    public function hijos() {
        return $this->belongsToMany(Componente::class, "componente_x_nivel", "nivel_jerarquico_id", "componente_id", "componente_id", "id");
    }

    public function componente() {
        return $this->belongsTo(Componente::class, "componente_id");
    }
}
