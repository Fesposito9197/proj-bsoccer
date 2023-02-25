<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Player;

class PlayerController extends Controller
{
    public function index()
    {
        $players = Player::with('user', 'roles', 'stars', 'sponsorships')->get();
        return $players;
    }

    public function show($id)
    {
        try {
            $player = Player::with('user', 'roles', 'stars', 'sponsorships', 'messages', 'reviews')->where('id', $id)->firstOrFail();
            return $player;
        } catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response([
                'error' => 'Errore 404 pagina non trovata'
            ], 404);
        }
    }
}
