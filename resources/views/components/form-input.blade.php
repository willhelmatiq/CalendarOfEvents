@props(['name', 'label', 'placeholder', 'errors', 'value'])

<div class="mt-2 mb-4">
    <div class="flex ">
        <label class="w-24 text-gray-500 text sm" for="{{$name}}">{{$label}}</label>
        <input type="text" value="{{ old($name, $value) }}" name="{{$name}}" placeholder="{{$placeholder}}" class="w-64 border border-gray-400 rounded-sm p-1">
    </div>
    <x-form-error name="{{$name}}" :errors="$errors"/>
</div>

