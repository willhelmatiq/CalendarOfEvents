<x-site-layout title="Categories">
    <ul>

    @foreach($categories as $category)
        <li>
            <a href="{{route('categories.show', $category->id)}}">
                <span class="font-semibold">{{$category->name}}</span>
                <span class="test-sm">{{$category->allowed_age}}</span>
            </a>
        </li>
    @endforeach
    </ul>
</x-site-layout>
