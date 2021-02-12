<div class="sm:col-span-{{$col}} mt-5  col-span-12 intro-y">
    <div class="intro-x flex items-center h-10">
        <h2 class="text-lg font-medium truncate me-5">
            {{ $title }}
        </h2>
    </div>
    <div class="report-timeline mt-5 relative">
        @foreach($elements as $element)
            <div class="intro-x relative flex items-center mb-3">
                <div class="report-timeline__image">
                    <div
                        class="w-16 h-16 flex items-center justify-center z-40 bg-theme-white text-primary flex-none background-th rounded-full overflow-hidden">
                        {{ $element->circleText }}
                    </div>
                </div>
                <div class="box px-5 py-3 ms-4 flex-1 zoom-in">
                    <div class="flex items-center">
                        <div class="font-medium">{{ $element->title }}</div>
                        <div class="text-xs text-gray-500 ms-auto">{{ $element->addon }}</div>
                    </div>
                    <div class="text-gray-600 mt-1">{{ $element->desc }}</div>
                </div>
            </div>
        @endforeach

    </div>
</div>
