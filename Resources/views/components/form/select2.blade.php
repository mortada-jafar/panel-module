<div class="label-field select-field  sm:col-span-{{$col}}   col-span-12 @if(isset($required)) required @endif">
    <label for="{{ $name }}">{{ $label }} </label>
    {{--    style="margin-bottom: 8px"--}}
    <div>

        <select name="{{ $name }}{{$multiple?'[]':''}}" id="{{$name}}"
                class="select-tail w-full @if(isset($required)) required @endif"
                data-change="{{$onChange}}"
                @if(isset($required))
                required
                @endif
                @if($init)
                data-init="true"
                @else
                data-init="false"
                @endif

                @if ($multiple)
                multiple
                @endif
                data-imageable="{{$imageable}}"
        >
            @if ($placeholder && !$multiple )
                                <option disabled="disabled" >{{$placeholder}}</option>
            @endif
            @foreach($items as $item)
                <option value="{{ $item->value }}"
                        @if( $imageable )
                        data-img="{{$item->image}}"
                        @endif
                        @if (isset($value) )
                            @if( isset($multiple) && $multiple  )
                                @if(in_array($item->value,$value))
                                selected
                                @endif
                            @elseif ($value==$item->value )
                                selected
                        @endif
                        @elseif ($item->checked)
                            selected
                        @endif
                >{{ $item->label }}</option>
            @endforeach
        </select>
    </div>
</div>
