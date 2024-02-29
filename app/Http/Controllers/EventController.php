<?php

namespace App\Http\Controllers;

use App\Models\Event;

use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
       $events = Event:: all();
       
        return view('pages.event.index', compact('events'));
    }
}
