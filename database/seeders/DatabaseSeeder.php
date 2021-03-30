<?php

namespace Database\Seeders;

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
//         $user = \App\Models\User::factory(1)->create()->first();
//         $role = \App\Models\Role::factory(1)->create()->first();
//         $user->roles()->attach($role->id);

           $par = \App\Models\Testpar::factory(10)->create()->first();

    }
}
