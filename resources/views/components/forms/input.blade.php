@props([
    'id',
    'type' => 'text',
    'name',
    'value' => '',
    'class' => 'bg-gray-200 appearance-none border-2 border-gray-200 rounded-full w-full p-2 text-gray-700 leading-tight focus:outline-none focus:bg-white',
    'label',
    'labelClass' => 'block text-gray-500 font-bold md:text-left mb-1 md:mb-0'
])

<div class="md:w-1/3">
    <label {{ $attributes->merge(['class' => $labelClass]) }} for="{{ $id }}">
        {{ $label }}
    </label>
</div>
<div class="md:w-2/3">
    <input {{ $attributes->merge(['class' => $class]) }} type="{{ $type }}" name="{{ $name }}" value="{{ old($name, $value) }}" id="{{ $id }}">
    @error($name)
        <div class="text-red-500 mt-2 text-sm">
            {{ $message }}
        </div>
    @enderror
</div>