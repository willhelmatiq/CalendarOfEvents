<x-site-layout title="Events">
    @if(auth()->user()->is_admin)
    <div class="mb-6 flex justify-end">
        <a href="{{route(('events.create'))}}" class="p-2 bg-green-500 text-green-50 rounded">Add event</a>
    </div>
    @endif()


    <ul>
    @guest
        @foreach($events as $event)
            <li>
                <a href="{{route('events.show', $event->id)}}" class="undeeline hover:bg-gray-200">
                    <span class="font-semibold">{{$event->title}}</span>
                    <span class="test-sm">{{$event->city}}</span>
                </a>
            </li>
        @endforeach
    @endguest
    @auth
        @if(!auth()->user()->is_admin)
            @foreach($events as $event)
                <li>
                    <a href="{{route('events.show', $event->id)}}" class="undeeline hover:bg-gray-200">
                        <span class="font-semibold">{{$event->title}}</span>
                        <span class="test-sm">{{$event->city}}</span>
                    </a>
                    <form method="post" action="{{route('addparticipant', $event->id)}}">
                        @csrf
                        <button type="submit" class="p-2 bg-green-500 text-green-50 rounded-lg">participate</button>
                    </form>
                    <span class="font-semibold">{{collect($event->participants)->count()}}</span>
                </li>
            @endforeach
        @else
                @foreach($events as $event)
                    <li>
                        <a href="{{route('events.show', $event->id)}}" class="undeeline hover:bg-gray-200">
                            <span class="font-semibold">{{$event->title}}</span>
                            <span class="test-sm">{{$event->city}}</span>
                        </a>
                        <a href="{{route('events.edit', $event->id)}}">edit</a>
                        <span class="font-semibold">{{collect($event->participants)->count()}}</span>
                    </li>
                @endforeach
        @endif
    @endauth
    </ul>
        {{$events->links()}}
</x-site-layout>
