<?php

namespace Database\Seeders;

use App\Models\Player;
use App\Models\Sponsorship;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PlayerSponsorshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $players = Player::inRandomOrder()->take(5)->get();
        $sponsorships = Sponsorship::all();

        DB::table('player_sponsorship')->truncate();

        foreach ($players as $player) {
            $sponsorship = $sponsorships->random();
            $duration_in_hours = $sponsorship->duration;
            $start_date = Carbon::now();
            $end_date = $start_date->copy()->addHours($duration_in_hours);


            DB::table('player_sponsorship')->insert([
                'player_id' => $player->id,
                'sponsorship_id' => $sponsorship->id,
                'start_date' => $start_date->toDateTimeString(),
                'end_date' => $end_date->toDateTimeString(),
            ]);
        }
    }
}
