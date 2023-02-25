@extends('layouts.admin')

@section('content')

    @if (!empty($player))   
        <div class="container-background bg-success" height="100vh">
            <div class="container p-3 text-white">
                <img height="150px" width="150px" class="mb-3 rounded-circle" 
                @if (!empty($player->profile_photo)) 
                src="{{$player->profile_photo}}"    
                src="{{ asset("storage/$player->profile_photo")}}"
                    
                @else
                    src='https://st3.depositphotos.com/6672868/14217/v/600/depositphotos_142179970-stock-illustration-user-profile-icon.jpg'
                @endif
                alt="{{ $player->name }}">
                <h2 class="border-bottom border-3 pb-3">Nome: {{ $player->user->name }}</h2>
                <h2 class="border-bottom border-3 pb-3">Città: {{ $player->city }}</h2>
                <h2 class="border-bottom border-3 pb-3">Descrizione: {{ $player->description }}</h2>
                
                <h2>Ruoli:</h2>
                @foreach ($player->roles as $role)
                    <span id="span_show" class="badge rounded-pill text-bg-dark py-2 my-2 mx-1 col-2"><a href="#" class="text-white text-decoration-none">{{ $role->name }}</a></span>
                @endforeach
                {{-- bottone edit --}}
                <a href="{{ route('admin.players.edit', $player) }}" class="btn btn-warning"><i class="fa-solid fa-pencil fa-lg fa-fw"></i></a>
                {{-- Bottone modale --}}
                <button type="button" class="btn btn-danger ms-2" data-bs-toggle="modal" data-bs-target="#modal-{{$player->id}}">
                    <i class="fa-solid fa-dumpster-fire fa-lg fa-fw"></i>
                </button>
                <!-- Modal -->
                <div class="modal fade" id="modal-{{$player->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5 text-dark" id="exampleModalLabel">Conferma</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-dark">
                                Sicuro di voler eliminare il tuo profilo {{$player->user->name}}?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <form action="{{ route('admin.players.destroy', $player) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Elimina</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="d-flex align-items-center">
            <h1>Benvenuto {{$users->name}} ! Crea ora il tuo profilo!</h1>
            <a href="{{ route('admin.players.create') }}" class="btn btn-success ms-2"><i class="fa-regular fa-square-plus fa-lg fa-fw"></i></a>
        </div>
    @endif  
@endsection