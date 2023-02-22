@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    @foreach ($messages as $message)
    <ul>
        <li>
            {{$message->name}}
            <p>{{$message->email}}</p>
            <p>{{$message->content}}</p>
            <p>{{$message->date_message}}</p>
        </li>
    </ul>
    @endforeach
</div>
    

    
    
@endsection