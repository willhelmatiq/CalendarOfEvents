<x-site-layout title="Welcome page!">
    @foreach($events as $event)
        <h2 class="font-bold">{{ $event->title }} </h2>
        <div>{{$event->description}}</div>
    @endforeach
</x-site-layout>
