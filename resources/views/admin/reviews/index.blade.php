@extends('layouts.admin')

@section('content')
<div class="container mt-4 d-flex">
    @foreach ($reviews as $review)
        <ul class="list-group">
            <li class="d-flex me-3" style="height: 100%;">
                <div class="card border-info border border-3" style="width: 18rem;">
                    <div class="card-body">
                        <h5>{{$review->name}}</h5>
                        <p class="border-bottom pb-2 mb-2 border-3 border-info">{{$review->email}}</p>
                        <p class="border-bottom pb-2 mb-2 border-3 border-info" style="min-height: 200px; max-height: 200px; overflow-x: auto;">{{$review->content}}</p>
                        <p class="text-end">{{$review->date_message}}</p>
                    </div>
                </div>
            </li>
        </ul>
    @endforeach
</div>
@endsection