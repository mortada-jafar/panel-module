<div
    style="background-color: {{$bg_color}};color: {{$color}};"
    class="flex items-center px-2 @if($rounded) rounded-full @endif mx-1 justify-center @if($isCopyable) copyable tooltip cursor-pointer @endif"
    @if($isCopyable)  title="کپی" @endif>
    @if(isset($icon))
        <i data-feather="{{$icon }}" class="w-4  me-2 stroke-2"></i>
    @endif
    @if(isset($text))
        {{$text}}
    @endif
</div>
