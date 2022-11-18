<x-site-layout title="List of writers">
    <ul>

    @foreach($users as $user)
        <li>
            <span class="font-semibold">{{$user->name}}</span>
            <span class="test-sm">{{$user->email}}</span>
        </li>
    @endforeach
    </ul>
</x-site-layout>
