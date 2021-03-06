<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UserAdministratorCreateInUsersTable::class);
         $this->call(CommissionCreateInCommissionTable::class);
         $this->call(PositionDefaultCreateAuthoritiesTable::class);
    }
}
