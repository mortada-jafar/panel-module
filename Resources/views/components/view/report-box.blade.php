<div class="sm:col-span-{{$col}} mt-5  col-span-12 intro-y">
    <div class="report-box zoom-in">
        <div class="box p-5">
            <div class="flex">
                <i data-feather="{{ $icon }}" class="report-box__icon text-theme-primary"></i>
                <div class="ms-auto flex">
                    @if(isset($bottom))
                        {{$bottom->render()}}
                    @endif
                    <div
                        class="report-box__indicator {{ $value-$value2>=0 ? "bg-theme-info" : "bg-theme-danger"}} cursor-pointer">
                        {{$value- $value2>=0 ? "+" : "-"}} {{ $value-$value2 }}
                        <i data-feather="{{ $value-$value2>=0 ? "chevron-up" :"chevron-down"}}" class="w-4 h-4"></i>
                    </div>
                </div>
            </div>
            <div class="text-3xl font-bold leading-8 mt-6">{{ $value }}</div>
            <div class="text-base text-gray-600 mt-1">{{ $title }}</div>
        </div>
    </div>
</div>
