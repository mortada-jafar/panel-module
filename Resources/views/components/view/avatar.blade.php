<div class="sm:col-span-{{$col}}   col-span-12 flex items-center justify-center lg:justify-start">
    <div class="w-20 h-20 sm:w-24 sm:h-24 flex-none lg:w-32 lg:h-32 image-fit relative">
        <img src="{{$image}}" class="rounded-full "/>
    </div>
    @if($name || $bio)
        <div class="ms-5">
            @if($name)
                <div class="w-24 sm:w-40 truncate sm:whitespace-normal font-medium text-lg">{{ $name }}</div>@endif
            @if($name)
                <div class="text-gray-600">{{ $bio }}</div>@endif
        </div>
    @endif
</div>


{{--<div class="flex flex-1 px-5 ">--}}
{{--    --}}
{{--</div>--}}
