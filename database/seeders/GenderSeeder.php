<?php

namespace Database\Seeders;

use App\Models\Gender;
use Illuminate\Database\Seeder;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genderName = ["Male","Female"];
        foreach ($genderName as $name){
            Gender::create([
                'gender_desc' => $name,
            ]);
        }
    }
}
