@props(['name', 'errors'])
@error($name)
<div class="text-red-600 bg-red-50 rounded-sm p-1">
    @foreach ($errors->get($name) as $error)
        <li>{{ $error }}</li>
    @endforeach
</div>
@enderror
