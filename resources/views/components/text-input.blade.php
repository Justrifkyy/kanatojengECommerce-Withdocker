@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'w-full bg-gray-50 text-secondary border-gray-300 rounded-lg focus:border-primary focus:ring-primary transition-colors duration-300']) !!}>
