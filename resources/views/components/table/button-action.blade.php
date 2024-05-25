@php
    $class = 'px-2 py-1 text-white font-bold rounded-lg';
    //check the button text
    if ($slot == 'edit') {
        $class .= ' bg-orange-500 text-sm font-normal';
    } elseif ($slot == 'delete') {
        $class .= ' bg-red-600';
    }elseif($slot == 'Create'){
        $class .= ' bg-blue-600 ';
    }

@endphp

<button {{$attributes(['class' => $class])}}>{{$slot}}</button>
