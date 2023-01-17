<?php

namespace App\Http\Controllers;

use App\Models\MyEvent;
use http\Client\Curl\User;
use Illuminate\Http\Request;

class MyEventController extends Controller
{
    public function overview(Request $request)
    {
        $events = MyEvent::paginate(5);

        return view('events.index', compact('events'));
    }
    public function index(Request $request)
    {
        $events = MyEvent::with('participants')->get();
        ray($events);
        return view('events.index', compact('events'));
    }

    public function show($id)
    {
        $event = MyEvent::find($id);

        return view('events.show', compact('event'));
    }

    public function create()
    {
        return view('events.create');
    }

    public function edit($id)
    {
        $event = MyEvent::find($id);

        return view('events.edit', compact('event'));
    }

    public function update($id, Request $request)
    {
        $event = MyEvent::find($id);
        $validated = $request->validate([
            'title' => 'required|min:5|max:255',
            'description' => 'required|min:5|max:255',
            'city' => 'required|min:3',

        ]);
        ray($event);
        $event->update($validated);
//        $event->update([
//            'title'=> $request->title,
//            'description' => $request->description,
//            'city' => $request->city,
        ////            'date' => now(),
        ////            'max_part_count' => '45',
        ////            'current_part_count' => '0',
        ////            'category_id' => '1',
//        ]);

        return redirect()->route('events.show', $event->id);
    }

    public function store(Request $request)
    {
        ray($request);
        $validated = $request->validate([
            'title' => 'required|min:5|max:255',
            'description' => 'required|min:5|max:255',
            'city' => 'required|min:3',

        ]);
        $event = MyEvent::create([
            'title' => $request->title,
            'description' => $request->description,
            'city' => $request->city,
            'date' => now(),
            'max_part_count' => '45',
            'current_part_count' => '0',
            'category_id' => '1',
        ]);
        ray($event);

        return redirect()->route('events.index');
    }

    public function addparticipant(Request $request){
        ray($request);
        $userId=auth()->user()->id;
        $user = User::find($userId);
//        $event = MyEvent::find($eventId);
//        $event->participants()->attach($user->id);

        return redirect()->route('events.index');

    }
}
