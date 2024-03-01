@extends('layouts.app')

@section('content')

    <div class="text-center">
        <h1>Event: {{ $event -> title }}</h1>

        <br>
        <a href="{{ route('events.edit', $event -> id) }}">EDIT</a>
        <br>
        <form
            action="{{ route('events.destroy', $event -> id) }}"
            method="POST"
        >
            @csrf
            @method('DELETE')

            <input type="submit" value="DELETE" >
        </form>
        <br>

        <p>{{ $event -> description }}</p>
        <p>{{ $event -> location }}</p>
        <p>{{ $event -> date }}</p>

        <h3>Tags:</h3>
        <ul>
            @foreach($event -> tags as $tag)
                <li>{{ $tag -> name }}</li>
            @endforeach
        </ul>

        <h3>User: {{ $event -> user -> name }}</h3>
    </div>

@endsection