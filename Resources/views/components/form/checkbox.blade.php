<div class="label-field radio-field sm:col-span-{{$col}}   col-span-12">
    <label class="active" for="">{{ $label }}</label>
    <div class="flex flex-col sm:flex-row mt-2">

        @foreach($items as $item)
            <div class="flex items-center text-gray-700 me-2 cursor-pointer ">
                <input class="input border me-2" value="{{ $item->value }}" name="{{$name}}[]" type="checkbox"

                       id="{{ $name . '-'.$item->value }}"

                       @if (isset($value) )
                       @if ($value==$item->value )
                       checked
                       @endif
                       @elseif ($item->checked)
                       checked
                    @endif

                />
                <label class="select-none" for="{{ $name . '-'.$item->value }}">
                    {{ $item->label }}
                </label>
            </div>
        @endforeach
    </div>
</div>
