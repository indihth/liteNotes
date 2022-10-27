{{-- 'field' and 'value' variable assigned in form, defaul values are blank--}}
@props(['disabled' => false, 'field' => '', 'value' => ''])

<textarea {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50']) !!}
    >{{-- passes in the user input to refill form after an error in other field --}}{{ $value }}</textarea>

@error($field)
    <div class="text-red-600 text-sm"> {{ $message }}</div> 
@enderror