<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Player;

class PlayerController extends Controller
{
    // public function index()
    // {
    //     $players = Player::with('user', 'roles', 'stars', 'sponsorships')->get();
    //     return $players;
    // }

    public function index(Request $request)
    {
        $players = Player::query();

        // Verifica se il parametro 'role' è presente nella richiesta
        if ($request->has('role')) {
            $role = $request->input('role');
            // Esegue una query per recuperare solo i giocatori con il ruolo specificato
            $players->whereHas('roles', function ($query) use ($role) {
                $query->where('name', $role);
            });
        }

        // Restituisci i giocatori filtrati o tutti i giocatori se non è stato applicato alcun filtro
        $players = $players->with('user', 'roles', 'stars', 'sponsorships')->get();

        return response()->json($players);
    }

    public function show($id)
    {
        try {
            $player = Player::with('user', 'roles', 'stars', 'sponsorships', 'messages', 'reviews')->where('id', $id)->firstOrFail();
            return $player;
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response([
                'error' => 'Errore 404 pagina non trovata'
            ], 404);
        }
    }
}
