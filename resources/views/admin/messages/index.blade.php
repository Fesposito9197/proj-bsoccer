@extends('layouts.admin')

@section('content')
<div class="container mt-4 d-flex flex-wrap">
    @foreach ($messages as $message)
        <ul class="list-group mb-3">
            <li class="d-flex me-3" style="height: 100%;">
                <div class="card border-secondary border border-3" style="width: 18rem;">
                    <div class="card-body">
                        <h5>{{$message->name}}</h5>
                        <a class="border-bottom  border-secondary text-decoration-none" href="mailto:{{$message->email}}">{{$message->email}}</a>
                        <p class="border-bottom pb-2 mb-2 border-3 border-secondary" style="min-height: 200px; max-height: 200px; overflow-x: auto;">{{$message->content}}</p>
                        <p class="text-end">{{$message->date_message}}</p>
                    </div>
                </div>
            </li>
        </ul>
    @endforeach
</div>
@endsection