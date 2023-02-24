@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Modifica: {{ $player->user->name }}</h1>
        <form action="{{ route('admin.players.update', $player) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="profile_photo" class="form-label">Modifica foto profilo</label>
                <img id="output" width="100" class="d-block my-3"
                    @if ($player->profile_photo) src='{{ asset("storage/$player->profile_photo") }}' @endif />
                <input type="file" class="form-control @error('profile_photo') is-invalid @enderror" id="profile_photo"
                    name="profile_photo" value="{{ old('profile_photo', $player->profile_photo) }}"
                    onchange="loadFile(event)">
                <script>
                    const loadFile = function(event) {
                        const output = document.getElementById('output');
                        output.src = URL.createObjectURL(event.target.files[0]);
                        output.onload = function() {
                            URL.revokeObjectURL(output.src)
                        }
                    };
                </script>
                @error('profile_photo mt-3')
                    <div class="alert
                    alert-danger">{{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="phone_number" class="form-label">Modifica numero di telefono</label>
                <input type="tel" class="form-control @error('phone_number') is-invalid @enderror" required
                    name="phone_number" id="phone_number" value="{{ old('phone_number', $player->phone_number) }}">
                @error('phone_number')
                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label @error('description') is-invalid @enderror">Modifica
                    descrizione</label>
                <textarea name="description" class="form-control" id="description" cols="30" rows="5" required>{{ old('description', $player->description) }}</textarea>
                @error('description')
                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="birth_date"class="form-label">Modifica la data di nascita</label>
                <input type="date" class="form-control @error('birth_date') is-invalid @enderror" name="birth_date"
                    id="birth_date" value="{{ old('birth_date', $player->birth_date) }}">
                @error('birth_date')
                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="city" class="form-label">Modifica la tua citta</label>
                <input type="text" class="form-control  @error('city') is-invalid @enderror" required name="city"
                    id="city"value="{{ old('city', $player->city) }}">
                @error('city')
                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                @foreach ($roles as $role)
                    <div class="form-check form-check-inline">
                        @if ($errors->any())
                            <input class="form-check-input" type="checkbox" id="{{ $role->slug }}" name="roles[]"
                                value="{{ $role->id }}" {{ in_array($role->id, old('roles', [])) ? 'checked' : '' }}>
                        @else
                            <input class="form-check-input" type="checkbox" id="{{ $role->slug }}" name="roles[]"
                                value="{{ $role->id }}" {{ $player->roles->contains($role->id) ? 'checked' : '' }}>
                        @endif
                        <label class="form-check-label @error('roles') is-invalid @enderror"
                            for="{{ $role->slug }}">{{ $role->name }}</label>
                    </div>
                @endforeach
                @error('roles')
                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Modifica</button>
        </form>
    </div>
@endsection
