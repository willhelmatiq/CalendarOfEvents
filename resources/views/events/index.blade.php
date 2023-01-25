<x-site-layout title="Events">
    <ul>
{{--    @guest--}}
{{--        @foreach($events as $event)--}}
{{--            <li>--}}
{{--                <a href="" class="undeeline hover:bg-gray-200">--}}
{{--                    <span class="font-semibold">{{$event->name}}</span>--}}
{{--                    <span class="test-sm">{{$event->city}}</span>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--        @endforeach--}}
{{--    @endguest--}}
    @auth
{{--        @if(!auth()->user()->is_admin)--}}
{{--            @foreach($events as $event)--}}
{{--                <li>--}}
{{--                    <a href="" class="undeeline hover:bg-gray-200">--}}
{{--                        <span class="font-semibold">{{$event->name}}</span>--}}
{{--                        <span class="test-sm">{{$event->country}}</span>--}}
{{--                    </a>--}}
{{--                    <form method="post" action="{{route('addparticipant', $event->id)}}">--}}
{{--                        @csrf--}}
{{--                        <button type="submit" class="p-2 bg-green-500 text-green-50 rounded-lg">participate</button>--}}
{{--                    </form>--}}
{{--                    <span class="font-semibold">{{collect($event->participants)->count()}}</span>--}}
{{--                </li>--}}
{{--            @endforeach--}}
{{--        @else--}}
                @foreach($holidays as $holiday)
                    <li>
                        <a href="" class="undeeline hover:bg-gray-200">
                            <span class="font-semibold">{{$holiday->name}}</span>
                            <span class="test-sm">{{$holiday->date}}</span>
                        </a>
{{--                        <a href="{{route('events.edit', $event->id)}}">edit</a>--}}
{{--                        <span class="font-semibold">{{collect($event->participants)->count()}}</span>--}}
                    </li>
                @endforeach
{{--        @endif--}}
    @endauth
    </ul>
        {{$holidays->links()}}
</x-site-layout>
