<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Player;
use App\Http\Requests\StorePlayerRequest;
use App\Http\Requests\UpdatePlayerRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class PlayerController extends Controller
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
        $users = User::where('id', $userID)->first();
        return view('admin.players.index', compact('player', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.players.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePlayerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePlayerRequest $request)
    {
        $data = $request->validated();

        $userID = Auth::id();

        $new_player = new Player();
        $new_player->user_id = $userID;
        $new_player->fill($data);
        $new_player->save();

        if (isset($data['roles'])) {
            $new_player->roles()->sync($data['roles']);
        }

        if (isset($data['profile_photo'])) {
            $new_player->profile_photo = Storage::disk('public')->put('uploads', $data['profile_photo']);
        }

        return redirect()->route('admin.players.index')->with('success', 'Player created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function show(Player $player)
    {
        return view('admin.players.show', compact('player'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function edit(Player $player)
    {
        $roles = Role::all();
        return view('admin.players.edit', compact('player', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePlayerRequest  $request
     * @param  \App\Models\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePlayerRequest $request, Player $player)
    {

        $data = $request->validated();
        if (isset($data['profile_photo'])) {
            if ($player->profile_photo) {
                Storage::disk('public')->delete($player->profile_photo);
            }
            $img_path = Storage::disk('public')->put('uploads', $data['profile_photo']);
            $data['profile_photo'] = $img_path;
        }
        $player->update($data);
        $roles = isset($data['roles']) ? $data['roles'] : [];
        $player->roles()->sync($roles);
        return redirect()->route('admin.players.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function destroy(Player $player)
    {
        // $old_title = $project->title;
        if ($player->profile_photo) {
            Storage::disk('public')->delete($player->profile_photo);
        }

        $player->delete();

        return redirect()->route('admin.players.index');
    }
}
