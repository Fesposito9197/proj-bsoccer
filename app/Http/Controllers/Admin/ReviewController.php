<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Player;
use App\Models\Review;


class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userID = Auth::id();
        $player = Player::where('user_id', $userID)->first();

        $reviews = Review::where('player_id', $player->id)
            ->orderBy('date_message', 'desc')
            ->get();
        return view('admin.reviews.index', compact('player', 'reviews'));
    }
}
