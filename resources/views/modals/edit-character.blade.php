@extends('components.modal')

@section('content')
    <h1>Edit Character</h1>
    <form action="/edit-character" method="post">
        @csrf
        <input type="text" name="name" placeholder="Name" value="{{ $character->name }}" required autofocus>
        <input type="number" name="engineering_mod" placeholder="Engineering Mod" value="{{ $character->engineering_mod }}">
        <select name="starship_id" required>
            <option value="" disabled>Starship</option>
            @foreach (auth()->user()->starships as $starship)
                @if ($starship->id == $character->starship_id)
                    <option value="{{ $starship->id }}" selected>{{ $starship->name }}</option>
                @else
                    <option value="{{ $starship->id }}">{{ $starship->name }}</option>
                @endif
            @endforeach
        </select>
        <div id="modal-buttons">
            <input hidden name="character_id" value="{{ $character->id }}">
            <button type="submit">Save</button>
            <button type="button" id="close-button">Cancel</button>
        </div>
    </form>
@endsection
