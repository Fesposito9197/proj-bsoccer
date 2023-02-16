<?php

namespace Database\Seeders;

use App\Models\Player;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Faker\Generator as Faker;

class PlayerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        
        Schema::disableForeignKeyConstraints();
        Player::truncate();
        Schema::enableForeignKeyConstraints();
        for ($i=0; $i < 2 ; $i++) { 
            
            $user = User::first();
            $new_player = new Player();
            $new_player->profile_photo = $faker->name();
            $new_player->phone_number = $faker->phoneNumber();
            $new_player->description = $faker->text(100);
            $new_player->birth_date = $faker->date();
            $new_player->city = $faker->state();
            $new_player->user_id = $user->id;
    
            $new_player->save();
        }
    }
}
