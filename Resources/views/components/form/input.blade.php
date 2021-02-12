<div
    class="label-field  sm:col-span-{{$col}}   col-span-12  @if(isset($class)) {{$class}} @endif @if(isset($required)) required @endif"
    id="{{$id ?? $name}}-parent" @if(isset($is_hidden) && $is_hidden) style="display: none" @endif >
    <label for="{{ $name }}">{{ $label }} </label>
    <input
        class="
        @if($type==\Modules\PanelCore\Dynamic\enums\ContentType::CURRENCY)
            currency
            @endif
        @if ($type==\Modules\PanelCore\Dynamic\enums\ContentType::DATE)
            datepicker

        @endif

            input w-full  "
        id="{{ $id ?? $name }}"

        @if((isset($type) && ($type==\Modules\PanelCore\Dynamic\enums\ContentType::DATE||$type==\Modules\PanelCore\Dynamic\enums\ContentType::CURRENCY)) || !isset($type))
        type="text"
        @else
        type="{{$type}}"
        @endif
        name="{{$name}}"
        @if(isset($required))
        required
        @endif


        @if(isset($value))
        @if ($type!=\Modules\PanelCore\Dynamic\enums\ContentType::PASSWORD)
            @if ($type==\Modules\PanelCore\Dynamic\enums\ContentType::DATE)
                data-date-type="{{getCurrentLocalDateType()}}"
                value="{{getOriginalDate($value)}}"
            @else
                value="{{$value}}"
            @endif

        @endif
        @endif


        @if($type==\Modules\PanelCore\Dynamic\enums\ContentType::TIME)
        min='00:01' max='10:00'
        @if(!isset($value))
        value="01:00"
        @endif
        @endif

        @if($type==\Modules\PanelCore\Dynamic\enums\ContentType::EMAIL || $type==\Modules\PanelCore\Dynamic\enums\ContentType::PASSWORD)
        autocomplete="new-password"
        @endif

    />
    @if(isset($checkbox) && $checkbox)
        <div class="flex items-center text-gray-700 me-2 cursor-pointer ">
            <input class="input border me-2 nowDateCheckbox" id="{{ $checkbox->value }}" name="{{ $checkbox->value }}"
                   @if($checkbox->checked) checked @endif
                   type="checkbox"/>
            <label class="select-none" for="{{ $checkbox->value }}">
                {{ $checkbox->label }}
            </label>
        </div>
        @if($checkbox->checked)

        @endif
    @endif
</div>

@if ($type==\Modules\PanelCore\Dynamic\enums\ContentType::DATE)
    <input type="hidden" name="{{ $name }}" id="{{ $name }}-alt">
@endif









