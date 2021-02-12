<div class="label-field  sm:col-span-{{$col}}   col-span-12  @if(isset($class)) {{$class}} @endif @if(isset($required)) required @endif">
    <label for="editor-{{$name}}" >{{ $label }}</label>
    <textarea id="editor-{{$name}}" name="{{$name}}" class="ck-editor"  @if(isset($required)) required @endif >{!! $value !!}</textarea>
</div>
