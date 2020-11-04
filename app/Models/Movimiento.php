<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movimiento extends Model
{
    use HasFactory;
    protected $guarded = ["id"];
    public function raiz() {
        return $this->hasOne(NivelJerarquico::class, "componente_id", "root_id")->first();
    }

    public function update() {

    }
}
