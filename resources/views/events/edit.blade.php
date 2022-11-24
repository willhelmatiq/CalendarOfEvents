<x-site-layout >
    <x-form method="post" route="{{route('events.update', $event->id)}}" title="edit event" submit="Update">
        @method('put')
        <x-form-input name="title" label="Event title" placeholder="give a title of at list 5 characters" :errors="$errors" value="{{$event->title}}"/>
        <x-form-input-text name="description" label="Event description" placeholder="fill out" :errors="$errors" value="{{$event->description}}"/>
        <x-form-input name="city" label="City" placeholder="give a title of at list 3 characters" :errors="$errors" value="{{$event->city}}"/>
    </x-form>
</x-site-layout>
