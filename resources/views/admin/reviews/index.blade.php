@extends('layouts.admin')
@section('content')
<div class="container mt-4">
    @foreach ($reviews as $review)
        <ul>
            <li>
                {{$review->name}}
                <p>{{$review->content}}</p>
                <p>{{$review->date_message}}</p>
            </li>
        </ul>
    @endforeach
</div>
@endsection