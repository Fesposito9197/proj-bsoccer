@extends('layouts.admin')

@section('content')
  <div class="container mt-4 d-flex flex-wrap">
    @if (count($messages) == 0)
    <h1 class="text-light">NON HAI MESSAGGI AL MOMENTO</h1>
    
    @else
    @foreach ($messages as $message)
      <ul class="list-group mb-3">
        <li class="d-flex me-3" style="height: 100%;">
          <div class="card border-secondary border border-3" style="width: 18rem;">
            <div class="card-body">
                <h5>{{$message->name}}</h5>
                <a class="border-bottom  border-secondary text-decoration-none" href="mailto:{{$message->email}}">{{$message->email}}</a>
                <p class="border-bottom pb-2 mb-2 border-3 border-secondary fs-5" style="min-height: 200px; max-height: 200px; overflow: hidden;">{{$message->content}}</p>
                <p class="text-end">{{$message->date_message}}</p>

                <!-- Attiva modale -->
                <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#modal-{{$message->id}}"><i class="fa-solid fa-eye"></i></button>

                          {{-- Modale --}}
                          <div class="modal" id="modal-{{$message->id}}" tabindex="-1">
                              <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title">Messaggio</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                      <p>{{$message->content}}</p>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                  </div>
                                </div>
                              </div>
                            </div>

                      </div>
                  </div>
              </li>
          </ul>
      @endforeach
      @endif
  </div>
@endsection