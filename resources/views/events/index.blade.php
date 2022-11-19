<x-site-layout title="Events">
    <ul>
    @foreach($events as $event)
        <li>
            <a href="{{route('events.show', $event->id)}}" class="undeeline hover:bg-gray-200">
                <span class="font-semibold">{{$event->title}}</span>
                <span class="test-sm">{{$event->city}}</span>
            </a>
        </li>
    @endforeach
    </ul>
</x-site-layout>
