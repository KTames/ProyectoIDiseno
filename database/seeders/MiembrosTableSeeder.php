<?php

namespace Database\Seeders;

use App\Models\Miembro;
use Illuminate\Database\Seeder;

class MiembrosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $miembros = Miembro::factory()->count(50)->create();
    }
}
