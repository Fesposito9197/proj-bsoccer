<?php

namespace Database\Seeders;

use App\Models\Player;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class Player_roleseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Prendi tutti i player e i role
        $players = DB::table('players')->get();
        $roles = DB::table('roles')->get();

        DB::table('player_role')->truncate();


        foreach ($players as $player) {
            // Prendi tutti i role già assegnati al player
            $assignedRoles = DB::table('player_role')
                ->where('player_id', $player->id)
                ->pluck('role_id')
                ->toArray();
            // Se il player non ha alcun role assegnato, assegnagli un role casuale
            if (count($assignedRoles) == 0) {
                $availableRoles = $roles->pluck('id');
                $roleId = $availableRoles->random();
                DB::table('player_role')->insert([
                    'player_id' => $player->id,
                    'role_id' => $roleId,
                ]);
                $assignedRoles[] = $roleId;
            }

            // Se il player ha più di 2 role assegnati, rimuovi i role in eccesso
            if (count($assignedRoles) > 2) {
                $extraRoles = array_slice($assignedRoles, 2);
                DB::table('player_role')
                    ->where('player_id', $player->id)
                    ->whereIn('role_id', $extraRoles)
                    ->delete();
                $assignedRoles = array_slice($assignedRoles, 0, 2);
            }

            // Se il player ha meno di 2 role assegnati, assegnagli altri role casuali
            if (count($assignedRoles) < 2) {
                $availableRoles = $roles->whereNotIn('id', $assignedRoles)->pluck('id');
                $roleIds = $availableRoles->random(2 - count($assignedRoles));
                foreach ($roleIds as $roleId) {
                    DB::table('player_role')->insert([
                        'player_id' => $player->id,
                        'role_id' => $roleId,
                    ]);
                }
            }
        }
    }
}
