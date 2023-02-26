<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlayerStarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // seleziona manualmente gli id delle stelle
        $starIds = [1, 2, 3, 4, 5];

        // seleziona gli id dei giocatori
        $playerIds = DB::table('players')->pluck('id')->toArray();

        DB::table('player_star')->truncate();

        // assegna un numero casuale di star_id ad ogni player
        foreach ($playerIds as $playerId) {
            $numStars = rand(1, count($starIds)); // imposta il massimo valore a count($starIds)
            $selectedStars = array_rand(array_flip($starIds), $numStars);
            if (!is_array($selectedStars)) {
                $selectedStars = array($selectedStars); // converte il valore in un array di un solo elemento
            }
            foreach ($selectedStars as $starId) {
                DB::table('player_star')->insert([
                    'player_id' => $playerId,
                    'star_id' => $starId
                ]);
            }
        }
    }
}
