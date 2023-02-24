<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Player;

class PlayerController extends Controller
{
    public function index()
    {
        $players = Player::with('user', 'roles', 'stars')->get();
        return $players;
    }
}
