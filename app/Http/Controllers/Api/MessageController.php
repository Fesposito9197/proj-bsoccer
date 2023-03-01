<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\Player;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function store($player_id, Request $request)
    {
        // return $request->all();
        // $userID = Auth::id();
        $request->validate([
            'name' => 'nullable|string|max:100',
            'email' => 'required|string',
            'content' => 'required|string',
        ]);
        $data = $request->all();

        $new_message = new Message();
        $new_message->name = $data['name'];
        $new_message->email = $data['email'];
        $new_message->content = $data['content'];
        $new_message->date_message = Carbon::now();
        $new_message->player_id = $player_id;
        $new_message->save();

        return $new_message;
    }
}
