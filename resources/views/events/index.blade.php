<x-site-layout title="Events">
    <div class="mb-6 flex justify-end">
        <a href="{{route(('events.create'))}}" class="p-2 bg-green-500 text-green-50 rounded">Add event</a>
    </div>

    <ul>
    @foreach($events as $event)
        <li>
            <a href="{{route('events.show', $event->id)}}" class="undeeline hover:bg-gray-200">
                <span class="font-semibold">{{$event->title}}</span>
                <span class="test-sm">{{$event->city}}</span>
            </a>
            <a href="{{route('events.edit', $event->id)}}">edit</a>
        </li>
    @endforeach
    </ul>
</x-site-layout>
