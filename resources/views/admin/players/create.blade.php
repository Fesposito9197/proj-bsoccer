@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Crea il tuo profilo!</h1>
        <form action="{{ route('admin.players.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="profile_photo" class="form-label">Aggiungi una foto profilo</label>
                <img id="output" width="100" class="d-block my-3" />
                <input type="file" class="form-control @error('profile_photo') is-invalid @enderror" id="profile_photo"
                    name="profile_photo" value="{{ old('profile_photo') }}" onchange="loadFile(event)">
                <script>
                    const loadFile = function(event) {
                        const output = document.getElementById('output');
                        output.src = URL.createObjectURL(event.target.files[0]);
                        output.onload = function() {
                            URL.revokeObjectURL(output.src)
                        }
                    };
                </script>
                @error('profile_photo')
                    <div class="alert
                    alert-danger mt-3">{{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="phone_number" class="form-label">Aggiungi un numero di telefono*</label>
                <input type="tel" class="form-control @error('phone_number') is-invalid @enderror" required
                    name="phone_number" id="phone_number" value="{{ old('phone_number') }}">
                @error('phone_number')
                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label @error('description') is-invalid @enderror">Aggiungi una
                    descrizione*</label>
                <textarea name="description" class="form-control" id="description" cols="30" rows="5" required>{{ old('description') }}</textarea>
                @error('description')
                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="birth_date"class="form-label">Aggiungi la data di nascita*</label>
                <input type="date" class="form-control @error('birth_date') is-invalid @enderror" name="birth_date"
                    required id="birth_date" value="{{ old('birth_date') }}">
                @error('birth_date')
                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="city" class="form-label">Aggiungi la tua citta*</label>
                <input type="text" class="form-control @error('city') is-invalid @enderror" required name="city"
                    id="city"value="{{ old('city') }}">
                @error('city')
                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <h4>Aggiungi un o piu ruoli!*</h4>
                @foreach ($roles as $role)
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="{{ $role->slug }}" name="roles[]"
                            value="{{ $role->id }}" {{ in_array($role->id, old('roles', [])) ? 'checked' : '' }}>
                        <label class="form-check-label @error('roles') is-invalid @enderror"
                            for="{{ $role->slug }}">{{ $role->name }}</label>
                    </div>
                @endforeach
                @error('roles')
                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-success">Salva</button>
        </form>
    </div>
@endsection
