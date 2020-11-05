<?php

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role();
        $role->name = "admin";
        $role->description = "Administrador";
        $role->save();

         $role = Role();
        $role->name = "user";
        $role->description = "user";
        $role->save();

    }
}
