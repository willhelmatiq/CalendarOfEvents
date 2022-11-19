<?php

namespace App\Http\Controllers;

use App\Models\MyEvent;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function __invoke(Request $request)
    {
        $events = MyEvent::all();

        return view('welcome', compact('events'));
    }
}
