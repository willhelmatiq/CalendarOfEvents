<x-site-layout >
    <x-form method="post" route="{{route('holidays.store')}}" title="create event" submit="Create">
        <x-form-input name="title" label="Event title" placeholder="give a title of at list 5 characters" :errors="$errors" value=""/>
        <x-form-input-text name="description" label="Event description" placeholder="fill out" :errors="$errors" value=""/>
        <x-form-input name="city" label="City" placeholder="give a title of at list 3 characters" :errors="$errors" value=""/>
    </x-form>

</x-site-layout>
