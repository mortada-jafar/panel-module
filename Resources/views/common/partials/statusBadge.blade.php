<span class="badge {{ $class }}"
      @if(isset($caption))
      user-badge-caption="{{$caption}}"
      @else
      user-badge-caption=""
    @endif >
    {{$text}}
</span>
