@extends('layouts.app')

@section('content')

    <div class="text-center">
        <h1>Event Create</h1>
        <form
            action="{{ route('events.store') }}"
            method="POST"
        >

            @csrf
            @method('POST')

            <label for="title">Title</label>
            <br>
            <input type="text" name="title" id="title">
            <br>
            <label for="description">Description</label>
            <br>
            <textarea name="description" id="description" cols="30" rows="10"></textarea>
            <br>
            <label for="date">Date</label>
            <br>
            <input type="date" name="date" id="date">
            <br>
            <label for="time">Time</label>
            <br>
            <input type="time" name="time" id="time">
            <br>
            <label for="location">Location</label>
            <br>
            <input type="text" name="location" id="location">
            <br>
            <label for="tags">Tags</label>
            <br>
            @foreach($tags as $tag)
                <div>
                    <input type="checkbox" name="tags[]" value="{{ $tag -> id }}" id="tag{{ $tag -> id }}">
                    <label for="tag{{ $tag -> id }}">{{ $tag -> name }}</label>
                    <br>
                </div>
            @endforeach
            <br><br>
            <input type="submit" value="CREATE">
        </form>
    </div>

@endsection