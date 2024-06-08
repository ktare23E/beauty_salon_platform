@props(['active' => false ])

<a class="{{$active ? 'flex flex-row items-center h-12 px-4 rounded-lg text-gray-600 bg-gray-50 ':' flex flex-row items-center h-12 px-4 rounded-lg text-gray-100'}}" aria-current="page" {{$attributes}}> 
    {{$slot}}
</a>    