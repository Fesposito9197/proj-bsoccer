@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>create</h1>
    <form action="{{route('admin.players.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="profile_photo" class="form-label">Aggiungi una foto profilo</label>
        <input type="file" class="form-control" id="profile_photo" name="profile_photo"  value="{{old('profile_photo')}}">
    </div>
    <div class="mb-3">
        <label for="phone_number" class="form-label">Aggiungi un numero di telefono</label>
        <input type="tel"  class="form-control" name="phone_number" id="phone_number" value="{{old('phone_number')}}">
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Aggiungi una descrizione</label>
        <textarea name="description" class="form-control" id="description" cols="30" rows="5">{{old('description')}}</textarea>
    </div>
    <div class="mb-3">
        <label for="birth_date"class="form-label">Aggiungi la data di nascita</label>
        <input type="date" class="form-control" name="birth_date" id="birth_date"  value="{{old('birth_date')}}">
    </div>
    <div class="mb-3">
        <label for="city" class="form-label">Aggiungi la tua citta</label>
        <input type="text" class="form-control" name="city" id="city"value="{{old('city')}}">
    </div>
    <div class="mb-3">
        
        {{-- <label for="role_id" class="form-label">Tipologia</label>
        <select class="form-select" name="role_id" id="role_id" aria-label="Default select example">
            <option value="">Senza Ruolo</option>
            @foreach ($roles as $role)
            <option value="{{$role->id}}" {{old('role_id') == $role->id ? 'selected' : ''}} >{{$role->name}}</option>
            @endforeach
        </select> --}}
        @foreach ($roles as $role)
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="{{$role->slug}}" name="roles[]" value="{{$role->id}}" {{in_array( $role->id , old('roles',[])) ? 'checked' : ''}}>
                <label class="form-check-label" for="{{$role->slug}}">{{$role->name}}</label>
            </div>
        @endforeach
    </div>
    <button type="submit" class="btn btn-success">Salva</button>
    </form>
</div>
@endsection