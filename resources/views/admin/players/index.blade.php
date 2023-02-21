@extends('layouts.admin')

@section('content')
    <div class="container">
        @if (!empty($player))
        
        <table class="table mt-4">
            <thead class="table-dark">
              <tr>
                <th scope="col">Nome</th>
                <th scope="col">Cognome</th>
                <th scope="col">Citta</th>
                <th scope="col">numero di telefono</th>
                <th scope="col">ruoli</th>
                <th scope="col">Azioni</th>
              </tr>
            </thead>
            <tbody class="table-group-divider">
                <tr>
                    <td>{{ $player->user->name }}</td>
                    <td>{{ $player->user->surname }}</td>
                    <td>{{ $player->city }}</td>
                    <td>{{ $player->phone_number }}</td>
                    <td>
                        @foreach ($player->roles as $role)
                            <span class="badge rounded-pill text-bg-dark"><a  class="text-white text-decoration-none">{{ $role->name }}</a></span>
                        @endforeach
                    </td>
                    <td class="d-flex">
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle me-2" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            More
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="{{ route('admin.players.edit', $player) }}" class="dropdown-item">Modifica</a></li>
                                <li> <a href="{{ route('admin.players.show', $player) }}" class="dropdown-item" >Show</a></li>
                            </ul>
                        </div>
                        <button type="button" class="btn btn-danger ms-2" data-bs-toggle="modal" data-bs-target="#modal-{{$player->id}}">
                            <i class="fa-solid fa-dumpster "></i>
                          </button>
                    </td>
                </tr>
                <!-- Modal -->
                <div class="modal fade" id="modal-{{$player->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Conferma</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
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
            </tbody>
        @else
            <div class="d-flex align-items-center">
                
                <h1>Benvenuto {{$users->name}} ! Crea ora il tuo profilo!</h1>
                <a href="{{ route('admin.players.create') }}" class="btn btn-success ms-2"><i class="fa-regular fa-square-plus fa-lg fa-fw"></i></a>
            </div>
        @endif
    </div>
@endsection