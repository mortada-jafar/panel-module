@php
    $badge=($column->func)($data);
@endphp

<div style="background-color: {{$badge->bg_color}};color: {{$badge->color}};"
     class="text-center rounded px-2 mt-1 @if($column->copyable) copyable tooltip cursor-pointer @endif "
     @if($column->copyable)  title="کپی" @endif >{{$badge->text}}</div>
