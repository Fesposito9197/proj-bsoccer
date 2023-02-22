@extends('layouts.admin')

@section('content')
<div class="container mt-4 d-flex">
    @foreach ($messages as $message)
        <ul class="list-group">
            <li class="d-flex me-3">
                <div class="card border-secondary border border-3" style="width: 18rem;">
                    <div class="card-body">
                        <h5>{{$message->name}}</h5>
                        <p class="border-bottom pb-2 mb-2 border-3 border-secondary">{{$message->email}}</p>
                        <p class="border-bottom pb-2 mb-2 border-3 border-secondary">{{$message->content}}</p>
                        <p class="text-end">{{$message->date_message}}</p>
                    </div>
                </div>
            </li>
        </ul>
    @endforeach
</div>
@endsection