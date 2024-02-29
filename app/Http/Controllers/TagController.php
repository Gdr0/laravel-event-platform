<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Tag;

class TagController extends Controller
{
    public function index()
    {
        $tags = tag :: all();
    
        return view('pages.tag.index', compact('tags'));
    }
}
