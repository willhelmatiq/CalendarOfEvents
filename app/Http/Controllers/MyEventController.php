<?php

namespace App\Http\Controllers;

use App\Models\MyEvent;
use Illuminate\Http\Request;

class MyEventController extends Controller
{
    public function index(Request $request)
    {
        $events = MyEvent::all();

        return view('events.index', compact('events'));
    }

    public function show($id)
    {
        $event = MyEvent::find($id);

        return view('events.show', compact('event'));
    }
}
