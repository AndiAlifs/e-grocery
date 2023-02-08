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
            'display_picture_link' => 'images/profile_pic/admin.jpg',
            'password' => bcrypt('admin123')
        ];
        User::create($data);

        $data = [
            'role_id' => 2,
            'gender_id' => 2,
            'first_name' => 'User',
            'last_name' => 'Normal',
            'email' => 'user@user.com',
            'display_picture_link' => 'images/profile_pic/user.png',
            'password' => bcrypt('user123')
        ];
        User::create($data);
    }
}
