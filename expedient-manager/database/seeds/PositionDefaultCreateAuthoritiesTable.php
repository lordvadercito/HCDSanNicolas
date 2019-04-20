<?php

use Illuminate\Database\Seeder;

class PositionDefaultCreateAuthoritiesTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Authority::create([
            'position' => 'Presidente'
        ]);

        \App\Models\Authority::create([
            'position' => 'Secretario'
        ]);
    }
}
