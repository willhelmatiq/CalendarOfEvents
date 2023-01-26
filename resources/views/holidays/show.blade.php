<x-site-layout title="Event {{$event->title}}">

    {{$event->description}}
    @foreach($event->participants as $user)
        <li>
                <span class="font-semibold">{{$user->name}}</span>
        </li>
    @endforeach

</x-site-layout>
