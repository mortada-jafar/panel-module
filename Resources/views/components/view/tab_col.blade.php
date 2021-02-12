<div class="intro-y   col-span-12 lg:col-span-{{$col}} box">
    @if($title)
        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 col-span-12">
            <h2 class="font-medium text-base me-auto">
                {{$title}}
            </h2>
        </div>
    @endif

    <div class="nav-tabs  flex flex-col sm:flex-row justify-center lg:justify-bottom col-span-12  ">
        @foreach($tabs as $tab)
            <a data-toggle="tab" data-target="#{{ $tab->id }}"
               href="javascript:;"
               class="pt-2 pb-1 text-center flex-1  @if ($loop->first) active @endif">{{ $tab->title }}</a>
        @endforeach
    </div>
    <hr>
    <div class="tab-content col-span-12">
        @foreach($tabs as $tab)
            {{ $tab->render() }}
        @endforeach
    </div>

</div>
