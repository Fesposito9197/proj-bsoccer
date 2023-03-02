<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ReviewController extends Controller
{
    public function store($player_id, Request $request)
    {
        $request->validate([
            'name' => 'nullable|string|max:100',
            'content' => 'required|string',
        ]);
        $data = $request->all();

        $new_review = new Review();
        $new_review->name = $data['name'];
        $new_review->content = $data['content'];
        $new_review->date_message = Carbon::now();
        $new_review->player_id = $player_id;
        $new_review->save();

        return $new_review;
    }
}
