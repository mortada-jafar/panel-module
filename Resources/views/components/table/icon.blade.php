<div class="flex items-center justify-center @if($column->copyable) copyable tooltip cursor-pointer @endif" @if($column->copyable)  title="کپی" @endif>
    @php
        $icon=($column->func)($data);
    @endphp
    <i style="color: {{ $icon->color}}" data-feather="{{$icon->name }}" class="w-6 h-6 me-2 stroke-2"></i>
    @if(isset($icon->text))
        {{$icon->text}}
    @endif
</div>
