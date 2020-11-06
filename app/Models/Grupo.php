<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    use HasFactory;
    public $incrementing = false;

    public function componente() {
        return $this->belongsTo(NivelJerarquico::class);
    }
}
