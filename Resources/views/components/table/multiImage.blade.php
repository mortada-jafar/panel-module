<div class="flex">
    @foreach(($column->func)($data) as $image)
        <div class="w-10 h-10 image-fit zoom-in  @if (!$loop->first) -ms-5 @endif ">
            <img alt="Midone Tailwind HTML Admin Template" class="tooltip rounded-full tooltipstered"
                 src="{{ $image }}">
        </div>
    @endforeach
</div>
