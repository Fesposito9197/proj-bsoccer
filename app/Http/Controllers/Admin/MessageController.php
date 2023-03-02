<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\Player;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
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

        $messages = Message::where('player_id', $player->id)
            ->orderBy('date_message', 'desc')
            ->get();

        return view('admin.messages.index', compact('player', 'messages'));
    }
}
