<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        Schema::disableForeignKeyConstraints();
        User::truncate();
        Schema::enableForeignKeyConstraints();
        for ($i = 0; $i < 20; $i++) {
            $new_user = new User();
            $new_user->name = $faker->firstNameMale();
            $new_user->surname = $faker->lastName();
            $new_user->email = $faker->email();
            $new_user->password = Hash::make('password');
            $new_user->save();
        }
    }
}
