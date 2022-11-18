<x-site-layout title="List of writers">
    <ul>

    @foreach($users as $user)
        <li>
            <a href="{{route('users.show', $user->id)}}">
                <span class="font-semibold">{{$user->name}}</span>
                <span class="test-sm">{{$user->email}}</span>
            </a>
        </li>
    @endforeach
    </ul>
</x-site-layout>
