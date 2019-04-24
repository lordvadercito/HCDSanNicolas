<?php

use Illuminate\Database\Seeder;

class PositionDefaultCreateAuthoritiesTable extends Seeder
{
    /**
     * Crea los cargos del concejo, a fin de que estos queden fijos y solo puedan
     * modificarse los nombres y los apellidos de los mismos
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Authority::create([
            'position' => 'Presidente'
        ]);

        \App\Models\Authority::create([
            'position' => 'Secretario Legislativo'
        ]);

        \App\Models\Authority::create([
            'position' => 'Vicepresidente'
        ]);

        \App\Models\Authority::create([
            'position' => 'Vicepresidente 2°'
        ]);
    }
}
