<div class=" col-span-12 lg:col-span-{{$col}} m-2" >
    @if($method==\Modules\PanelCore\DataGrid\Types\MethodType::GET)
        <a href="{{$link}}"
           class="button text-white bg-theme-primary shadow-md" target="{{ $target }}">{{ $title }}</a>
    @else
        <button type="submit" class="button text-white bg-theme-primary shadow-md">{{ $title }}</button>
    @endif
</div>
