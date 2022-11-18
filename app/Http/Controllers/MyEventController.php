<?php

namespace App\Http\Controllers;

use App\Models\MyEvent;
use Illuminate\Http\Request;

class MyEventController extends Controller
{
    public function index(Request $request)
    {
        $events =  MyEvent::all();
        //dd($events);
        return view('welcome', compact('events'));

    }
}
