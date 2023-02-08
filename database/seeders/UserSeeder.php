<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'role_id' => 1,
            'gender_id' => 1,
            'first_name' => 'Admin',
            'last_name' => 'Super',
            'email' => 'admin@admin.com',
            'display_picture_link' => 'https://visualpharm.com/assets/381/Admin-595b40b65ba036ed117d3b23.svg',
            'password' => bcrypt('admin123')
        ];

        User::create($data);
    }
}
