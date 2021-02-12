<div class="intro-y  col-span-12 lg:col-span-{{$col}}
@if($transparent!=true)  box @endif

    ">
    @if($title)
        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 col-span-12">
            <h2 class="font-medium text-base me-auto">
                {{$title}}
            </h2>
        </div>
    @endif
    <div
        @if($isFlex)
        class="flex flex-row p-5 items-center"
        @else
        class="grid grid-cols-12 p-5 gap-{{$gap}}"
        @endif
    >
        @foreach($elements as $element)
            {!! $element->render() !!}
        @endforeach
    </div>
</div>
