<?php

namespace Database\Seeders;

use App\Models\Sponsorship;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class SponsorshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Sponsorship::truncate();
        Schema::enableForeignKeyConstraints();

        $sponsorships = [
            [
                'Type' => 'Base', 
                'Price' => 2.99,
                'Duration' => 24,

            ],

            [
                'Type' => 'Standard', 
                'Price' => 5.99,
                'Duration' => 72,

            ],

            [
                'Type' => 'Premium', 
                'Price' => 9.99,
                'Duration' => 144,

            ]
        ];

        foreach($sponsorships as $sponsorship)
        {
            $new_sponsorship = new Sponsorship();
            $new_sponsorship->typology = $sponsorship ['Type'];
            $new_sponsorship->price = $sponsorship ['Price'];
            $new_sponsorship->duration = $sponsorship ['Duration'];
            $new_sponsorship->save();
        }
    }
}
