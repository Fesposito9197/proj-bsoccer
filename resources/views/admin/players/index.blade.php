@extends('layouts.admin')

@section('content')
    <div class="container">
        @if (!empty($player))
            <h1>{{ $player->user->name }}</h1>
            <h1>{{ $player->city }}</h1>

            @foreach ($player->roles as $role)
                <span class="badge rounded-pill text-bg-dark"><a href="#"
                        class="text-white text-decoration-none">{{ $role->name }}</a></span>
            @endforeach
            <a href="{{ route('admin.players.edit', $player) }}" class="btn btn-warning">Modifica</a>
            <a href="{{ route('admin.players.show', $player) }}" class="btn btn-warning">Show</a>
            <form action="{{ route('admin.players.destroy', $player) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Si! Elimina</button>
            </form>
        @else
            <a href="{{ route('admin.players.create') }}" class="btn btn-success"><i
                    class="fa-regular fa-square-plus fa-lg fa-fw"></i></a>
        @endif

    </div>
@endsection
