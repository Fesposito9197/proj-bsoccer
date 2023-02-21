<?php

namespace Database\Seeders;

use App\Models\Message;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Faker\Generator as Faker;



class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        Schema::disableForeignKeyConstraints();
        Message::truncate();
        Schema::enableForeignKeyConstraints();
        for ($i = 0; $i < 2; $i++) {
            $message = User::inRandomOrder()->first();
            $new_message = new Message();
            $new_message->player_id = $message->id;
            $new_message->name = $faker->firstName();
            $new_message->email = $faker->email();
            $new_message->content = $faker->text(300);
            $new_message->date_message = $faker->dateTimeBetween('-1 years', 'now');
            $new_message->save();
        }
    }
}
