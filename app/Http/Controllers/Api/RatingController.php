<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Player;
use App\Models\Star;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function store($player_id, Request $request)
    {
        $request->validate([
            'rating' => 'required|integer',
        ]);

        $player = Player::find($player_id);

        $star_id = $request->input('rating');
        $star = Star::find($star_id);

        $player->stars()->attach($star);

        return $player->stars;
    }
}
