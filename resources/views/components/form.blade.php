<div>
    <h2 class="text-lg font-bold mb-4">{{$title}}</h2>
    <form method="{{$method}}" action="{{$route}}">
        @csrf

        {{$slot}}

        <button type="submit" class="p-2 bg-green-500 text-green-50 rounded-lg">{{$submit}}</button>
    </form>

</div>
