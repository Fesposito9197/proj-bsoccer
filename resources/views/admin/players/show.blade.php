@extends('layouts.admin')

@section('content')
    <div class="container-background bg-success" height="100vh">
        <div class="container p-3 text-white">
            @if (!empty($player))   
                <img height="150px" width="150px" class="mb-3 rounded-circle" src="{{ asset("storage/$player->profile_photo") }}"
                alt="{{ $player->name }}">
                <h2 class="border-bottom border-3 pb-3">Nome: {{ $player->user->name }}</h2>
                <h2 class="border-bottom border-3 pb-3">Città: {{ $player->city }}</h2>
                <h2 class="border-bottom border-3 pb-3">Descrizione: {{ $player->description }}</h2>
    
                <h2>Ruoli:</h2>
                @foreach ($player->roles as $role)
                    <span id="span_show" class="badge rounded-pill text-bg-dark py-2 my-2 mx-1 col-2"><a href="#"
                            class="text-white text-decoration-none">{{ $role->name }}</a></span>
                @endforeach
                
            @else
                <a href="{{ route('admin.players.create') }}" class="btn btn-success"><i
                        class="fa-regular fa-square-plus fa-lg fa-fw"></i></a>
            @endif
    
        </div>
    </div>
@endsection