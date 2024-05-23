@php
    $class = 'create_button bg-blue-500 rounded py-2 px-6 font-bold';
@endphp

<button {{ $attributes(['class' => $class]) }}>{{ $slot }}</button>