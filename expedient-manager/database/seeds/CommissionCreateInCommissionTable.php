<?php

use Illuminate\Database\Seeder;

class CommissionCreateInCommissionTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Commission::create([
            'name' => 'Medio Ambiente',
            'description' => 'Comisión parlamentaria de prueba',
        ]);
    }
}
