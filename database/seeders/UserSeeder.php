<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i = 0; $i<2; $i++){
            $new_user = new User();
            $new_user->name = $faker->name();
            $new_user->email = $faker->email();
            $new_user->password = $faker->password(2,5);
            $new_user->save();
        }
    }
}
