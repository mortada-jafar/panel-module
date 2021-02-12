<div class="sm:col-span-{{$col}}   col-span-12">
    @if($title)
        <div class="flex flex-col sm:flex-row items-center  border-b border-gray-200 col-span-12">
            <h2 class="font-medium text-base me-auto">
                {{$title}}
            </h2>
        </div>
    @endif
    <img class="object-contain" alt="{{$title ?? "F"}}" src={{$src}}>
</div>
