<x-site-layout title="Event {{$event->title}}">

    {{$event->description}}
    @foreach($event->participants as $user)
        <li>
{{--            <a href="{{route('events.show', $event->id)}}" class="undeeline hover:bg-gray-200">--}}
                <span class="font-semibold">{{$user->name}}</span>
{{--                <span class="test-sm">{{$event->city}}</span>--}}
{{--            </a>--}}
        </li>
    @endforeach

</x-site-layout>
