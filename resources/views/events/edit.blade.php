@extends('layouts.app')

@section('content')

    <div class="text-center">
        <h1>Event Create</h1>
        <form
            action="{{ route('events.update', $event -> id) }}"
            method="POST"
        >

            @csrf
            @method('PATCH')

            <label for="title">Title</label>
            <br>
            <input type="text" name="title" id="title" value="{{ $event -> title }}">
            <br>
            <label for="description">Description</label>
            <br>
            <textarea name="description" id="description" cols="30" rows="10">{{ $event -> description }}</textarea>
            <br>
            <label for="date">Date</label>
            <br>
            <input type="date" name="date" id="date" value="{{ $event -> getDateOnly() }}">
            <br>
            <label for="time">Time</label>
            <br>
            <input type="time" name="time" id="time" value="{{ $event -> getTimeOnly() }}">
            <br>
            <label for="location">Location</label>
            <br>
            <input type="text" name="location" id="location" value="{{ $event -> location }}">
            <br>
            <br>
            <h3><label for="tags">Tags</label></h3>
            @foreach($tags as $tag)
                <div>
                    <input type="checkbox" name="tags[]" value="{{ $tag -> id }}" id="tag{{ $tag -> id }}"
                        @foreach($event -> tags as $eventTag)
                            @if($eventTag -> id == $tag -> id)
                                checked
                            @endif
                        @endforeach
                    >
                    <label for="tag{{ $tag -> id }}">{{ $tag -> name }}</label>
                    <br>
                </div>
            @endforeach
            <input type="submit" value="UPDATE">
        </form>
    </div>

@endsection