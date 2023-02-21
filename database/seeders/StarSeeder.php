<?php

namespace Database\Seeders;

use App\Models\Star;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class StarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Star::truncate();
        Schema::enableForeignKeyConstraints();

        $stars = [1, 2, 3, 4, 5];
        foreach ($stars as $star) {
            $new_star = new Star();
            $new_star->rating = $star;
            $new_star->save();
        }
    }
}
