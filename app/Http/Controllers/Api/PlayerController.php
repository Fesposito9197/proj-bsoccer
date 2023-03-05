<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Player;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PlayerController extends Controller
{
    // public function index()
    // {
    //     $players = Player::with('user', 'roles', 'stars', 'sponsorships')->get();
    //     return $players;
    // }



    // public function index(Request $request)
    // {
    //     $players = Player::query();

    //     // Verifica se il parametro 'role' è presente nella richiesta
    //     if ($request->has('role')) {
    //         $role = $request->input('role');
    //         // Esegue una query per recuperare solo i giocatori con il ruolo specificato
    //         $players->whereHas('roles', function ($query) use ($role) {
    //             $query->where('name', $role);
    //         });
    //     }

    //     // Verifica se il parametro 'rating' è presente nella richiesta
    //     if ($request->has('rating')) {
    //         $rating = $request->input('rating');
    //         // Esegue una query per recuperare solo i giocatori con almeno una stella con il rating specificato
    //         $players->whereHas('stars', function ($query) use ($rating) {
    //             $query->where('rating', $rating);
    //         });
    //     }

    //     // Se è stato passato solo il filtro "role", restituisci solo i giocatori con quel ruolo
    //     if (!$request->has('role') && !$request->has('rating')) {
    //         $players = $players->with('user', 'roles', 'stars', 'sponsorships', 'reviews')->get();
    //     } elseif ($request->has('role') && !$request->has('rating')) {
    //         $players = $players->with('user', 'roles', 'stars', 'sponsorships', 'reviews')->get();
    //     }
    //     // Se è stato passato solo il filtro "rating", restituisci solo i giocatori con almeno una stella con quel rating
    //     elseif (!$request->has('role') && $request->has('rating')) {
    //         $players = $players->with(['user', 'roles', 'stars' => function ($query) {
    //             $query->select('player_id', 'star_id', DB::raw('AVG(rating) as avg_rating'))->groupBy('player_id', 'star_id');
    //         }, 'sponsorships', 'reviews'])->get();
    //     }
    //     // Altrimenti, restituisci i giocatori filtrati e la media del rating delle stelle per ciascun giocatore
    //     else {
    //         $players = $players->with(['user', 'roles', 'stars' => function ($query) {
    //             $query->select('player_id', 'star_id', DB::raw('AVG(rating) as avg_rating'))->groupBy('player_id', 'star_id');
    //         }, 'sponsorships', 'reviews'])->get();
    //     }

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

        // Verifica se il parametro 'rating' è presente nella richiesta
        if ($request->has('rating')) {
            $rating = $request->input('rating');
            // Esegue una query per recuperare solo i giocatori con almeno una stella con il rating specificato
            $players->whereHas('stars', function ($query) use ($rating) {
                $query->where('rating', $rating);
            });
        }

        // Se è stato passato solo il filtro "role", restituisci solo i giocatori con quel ruolo
        if (!$request->has('role') && !$request->has('rating')) {
            $players = $players->with('user', 'roles', 'stars', 'sponsorships', 'reviews')->paginate(12);
        } elseif ($request->has('role') && !$request->has('rating')) {
            $players = $players->with('user', 'roles', 'stars', 'sponsorships', 'reviews')->paginate(12);
        }
        // Se è stato passato solo il filtro "rating", restituisci solo i giocatori con almeno una stella con quel rating
        elseif (!$request->has('role') && $request->has('rating')) {
            $players = $players->with(['user', 'roles', 'stars' => function ($query) {
                $query->select('player_id', 'star_id', DB::raw('AVG(rating) as avg_rating'))->groupBy('player_id', 'star_id');
            }, 'sponsorships', 'reviews'])->paginate(12);
        }
        // Altrimenti, restituisci i giocatori filtrati e la media del rating delle stelle per ciascun giocatore
        else {
            $players = $players->with(['user', 'roles', 'stars' => function ($query) {
                $query->select('player_id', 'star_id', DB::raw('AVG(rating) as avg_rating'))->groupBy('player_id', 'star_id');
            }, 'sponsorships', 'reviews'])->paginate(12);
        }

        return $players;
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

    /*   public function getUserName(){
        $user= Auth::id();
        return response()->json([
            'response' => true,
            'results' => 2
        ]);
    } */
}
