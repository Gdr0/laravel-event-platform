<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
class ApiController extends Controller
{
    
    public function GetEvents() {

        // $events = Event :: paginate(3);

        $events =Event :: all();
        return response()->json([
            $events
        ]);
    }
}
