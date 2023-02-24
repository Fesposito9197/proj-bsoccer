<?php

namespace Database\Seeders;

use App\Models\Review;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Faker\Generator as Faker;


class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        Schema::disableForeignKeyConstraints();
        Review::truncate();
        Schema::enableForeignKeyConstraints();
        for ($i = 0; $i < 40; $i++) {

            $review = User::inRandomOrder()->first();
            $new_review = new Review();
            $new_review->player_id = $review->id;
            $new_review->name = $faker->firstNameMale();
            $new_review->content = $faker->text(300);
            $new_review->date_message = $faker->dateTimeBetween('-1 years', 'now');
            $new_review->save();
        }
    }
}
