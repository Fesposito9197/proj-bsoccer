@extends('layouts.admin')

@section('content')
    <div class="container bg-success p-3 text-white" style="height: 100vh">
        @if (!empty($player))    
            <h2>Nome: {{ $player->user->name }}</h2>
            <h2 class="my-3">Città: {{ $player->city }}</h2>
            <h2 class="mb-3">Descrizione: {{ $player->description }}</h2>

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
@endsection