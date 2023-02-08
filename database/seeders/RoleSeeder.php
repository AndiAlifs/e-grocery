<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = ["Admin","User"];
        foreach ($role as $name){
            Role::create([
                'role_name' => $name,
            ]);
        }
    }
}
