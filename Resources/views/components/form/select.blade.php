<div class="label-field select-field  sm:col-span-{{$col}}   col-span-12 @if(isset($required)) required @endif">
    <label for="{{ $name }}">{{ $label }} </label>
    <select
        class="input border mr-2" name="{{ $name }}{{$multiple?'[]':''}}" id="{{$name}}"
        @if (isset($required))
        required
        @endif
        @if ($multiple)
        multiple
        @endif

    >

        @if ($placeholder && !$multiple)
            <option disabled="disabled" selected>{{$placeholder}}</option>
        @endif
        @foreach($items as $item)
            <option value="{{ $item->value }}"
                    @if (isset($value) )
                    @if ($value==$item->value )
                    selected
                    @endif
                    @elseif ($item->checked)
                    selected
                @endif
            >{{ $item->label }}</option>
        @endforeach
    </select>
</div>
