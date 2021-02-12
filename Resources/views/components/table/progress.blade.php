@php
    $percentage=($column->func)($data);
@endphp

<div class="font-medium">{{$percentage}}%</div>
<div class="w-full h-1 mt-2 bg-gray-400 rounded-full">
    <div style="width: {{$percentage}}%" class="h-full bg-theme-primary rounded-full"></div>
</div>
