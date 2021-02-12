<div class="sm:col-span-{{$col}} md:col-spam-6    col-span-12 intro-y ">
    @if($title)
        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 col-span-12">
            <h2 class="font-medium text-base me-auto">
                {{$title}}
            </h2>
        </div>
    @endif
    <div class=" box @if($type=="line") p-5 @else pt-5 @endif">
        <div>
            <canvas class="mt-3"
                    height="280"
                    data-chart-type="{{$type}}"
                    data-data="{{ json_encode($data,JSON_HEX_QUOT) }}"
                    data-cutout-percentage="{{$cutoutPercentage??''}}"
                    data-colors="{{ json_encode($colors,JSON_HEX_QUOT) }}"></canvas>
        </div>
        @if($legend)
            <div class="mt-5 p-4">
                @foreach($data as $key=>$start)
                    <div class="flex items-center mt-4">
                        <div style="background-color: {{$colors[$loop->index]}}"
                             class="w-2 h-2 rounded-full me-3"></div>
                        <span class="truncate">{{$key}}</span>
                        <div class="h-px flex-1 border border-r border-dashed border-gray-300 mx-3 xl:hidden"></div>
                        <span class="font-medium xl:ms-auto">{{ $start }}</span>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>
