<div class="textarea label-field sm:col-span-{{$col}} col-span-12">
    <label for="{{ $name }}">{{ $label }} @if(isset($required)) * @endif</label>
    <textarea style="  resize: none;
    overflow: hidden;
    min-height: 20px;
    max-height: 100px;"  oninput="auto_grow(this)" id="{{ $name }}" name="{{$name}}" class="input"
              @if(isset($required)) required @endif >{!! $value !!}</textarea>
</div>
