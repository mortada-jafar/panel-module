<div  @if($value) date-init-empty="true"  @else date-init-empty="false" @endif class="sm:col-span-{{$col}}  repeater col-span-12 @if(isset($required)) required @endif">
    <label for="{{ $name }}">{{ $label }} </label>
    @if(!$value)
        <div data-repeater-create
             class="empty-continer w-full h-20 border-2 border-dashed rounded-md mt-3 flex justify-center items-center cursor-pointer">
            <p class="text-center text-theme-secondaryDark">کلیک کنید تا یک فیلد اضافه کنید</p>
        </div>
    @endif
    <div data-repeater-list="{{ $name }}">

        {{--        @dd($value)--}}
        @if($value)
            @foreach($value as $elements )
                <div data-repeater-item class="border-2 border-dashed rounded-md mt-3 pt-4 relative">
                    <div data-repeater-delete
                         class="tooltip w-6 h-6 zoom-in flex items-center justify-center absolute rounded-full text-white bg-theme-danger right-0 top-0 -mr-2 -mt-2 tooltipstered">
                        <i data-feather="x" class="w-5 h-5"></i>
                    </div>
                    <div class="grid grid-cols-12 p-5 gap-3">
                        @foreach($elements as $element)
                            {!! $element->render()    !!}
                        @endforeach
                    </div>
                </div>
            @endforeach
        @else
        <div data-repeater-item style="display: none" class="border-2 border-dashed rounded-md mt-3 pt-4 relative">
            <div data-repeater-delete
                 class="tooltip w-6 h-6 zoom-in flex items-center justify-center absolute rounded-full text-white bg-theme-danger right-0 top-0 -mr-2 -mt-2 tooltipstered">
                <i data-feather="x" class="w-5 h-5"></i>
            </div>
            <div class="grid grid-cols-12 p-5 gap-3">
                @foreach($elements as $element)
                    {!! $element->render()    !!}
                @endforeach
            </div>
        </div>
        @endif
    </div>
    <button @if(!$value) style="display: none" @endif data-repeater-create
            class="add-more-btn   border-2 border-dashed w-full border-t-0 p-3"
            type="button">@lang("PanelCore::panel.add-more")
    </button>
</div>

