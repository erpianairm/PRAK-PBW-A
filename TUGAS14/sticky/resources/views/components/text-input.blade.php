@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'w-full border-stone-600 bg-yellow-200 rounded-md shadow-sm']) !!}>
