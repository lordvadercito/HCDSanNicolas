<?php

use Illuminate\Database\Seeder;

class UserAdministratorCreateInUsersTable extends Seeder
{
    /**
     * Este seeder crea el usuario Administrador para start-up del sistema
     * @password: devtest1
     * @fields 'name', 'email', 'password', 'role'
     * @return void
     */
    public function run()
    {
        \App\Models\User::create([
            'name' => 'Administrador',
            'email' => 'administrador@agustinducca.com',
            'password' => bcrypt('devtest1'),
            'role'=>'Administrador'
        ]);
    }
}
