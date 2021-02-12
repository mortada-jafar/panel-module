<div
    class="sm:col-span-{{$col}} col-sm-12 box px-5 py-3 zoom-in  col-span-12 flex flex-col mb-2 sm:flex-row @if(isset($border)) border-s-2 border-theme-primary ps-4 @endif ">
    @if(isset($image))
        <div class="w-12 h-12 flex-none image-fit">
            <img alt="" class="rounded-full" src="{{$image}}">
        </div>
    @endif

    <div class="ms-4 me-auto">
        @if(isset($start))
            <p class="font-medium">{!! $start->render() !!}</p>
        @endif
        @if(isset($bottom))
            <div class="text-gray-600 mt-1"> {!! $bottom->render() !!}</div>
        @endif
    </div>
    <div class="w-full sm:w-auto flex items-center mt-3 sm:mt-0">
        @if(isset($value2))
            <div class="px-2 me-5"> {!! $value2->render() !!}</div>
        @else

        @endif

        @if(isset($end2))
            {!! $end2->render() !!}
        @endif
    </div>
</div>
