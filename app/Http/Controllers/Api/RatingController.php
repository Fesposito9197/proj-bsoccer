<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Star;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function store($player_id, Request $request)
    {
        $request->validate([
            'rating' => 'required|integer',
        ]);
        $data = $request->all();

        $new_rating = new Star();
        $new_rating->player_id = $player_id;
        $new_rating->star_id = $data['rating'];
        $new_rating->save();

        return $new_rating;
    }
}
