<?php

namespace Database\Seeders;

use App\Models\Player;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Player_roleseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $player_count = count(Player::all());

        for ($i = 1; $i <= $player_count; $i++) {
            $rand_count = rand(0, 2);
            $role = Role::inRandomOrder()->first();
            $player = Player::find($i);
            if ($rand_count > 0) {
                $first_role = Role::inRandomOrder()->first();
                if ($role == $first_role) {
                    $i--;
                    break;
                } elseif ($rand_count > 1) {
                    $second_role = Role::inRandomOrder()->first();
                    if ($role == $second_role || $second_role == $first_role) {
                        $i--;
                        break;
                    }
                    $player->roles()->sync([$role->id, $first_role->id, $second_role->id]);
                }
                $player->roles()->sync([$role->id, $first_role->id]);
            } else {
                $player->roles()->sync([$role->id]);
            }
        }
    }
}
