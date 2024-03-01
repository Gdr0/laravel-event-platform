<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Event;
use App\Models\Tag;
class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event :: all();

        $user = Auth::id();

        return view('events.index', compact('events', 'user'));

        }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag :: all();
        
        return view('events.create', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request -> all();

        $user = Auth::user();
        
        $id = Auth::id();

        $event = new Event;

        $event -> title = $data['title'];
        $event -> description = $data['description'];
        $event ->user_id = $user->id;
        $event -> save();
        $event -> tags() -> attach($data['tags']);

        return redirect() -> route('events.show', $event -> id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event :: find($id);

        return view('events.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event :: find($id);
        $tags = Tag :: all();

        return view('events.edit', compact('event', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request -> all();

        $event = Event :: find($id);

        $event -> title = $data['title'];
        $event -> description = $data['description'];

        $event -> save();

        $event -> tags() -> sync($data['tags']);
        return redirect() -> route('events.show', $event -> id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event :: find($id);
        $event -> tags() -> detach();
        $event -> delete();
        return redirect() -> route('events.index');
    }
}
