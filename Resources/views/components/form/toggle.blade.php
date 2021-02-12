<div class="label-field radio-field sm:col-span-{{$col}}   col-span-12">
    <label class="active" for="">{{ $label }}</label>
    <div class="switch flex flex-row align-items-center">
            <span class="mx-2">{{ $offLabel }}</span>
            <input type="checkbox"
                   name="{{$name}}"
                   id="{{$name}}"

                   @if ($value != 0 )
                   checked
                   @endif
                   class="input input--switch border">
        <span class="mx-2">{{ $onLabel }}</span>
    </div>
</div>



