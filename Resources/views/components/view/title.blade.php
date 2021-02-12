<div class="intro-x flex items-center h-10 sm:col-span-12">
    <h2 class="text-lg font-medium truncate mr-5">
        {{ $title }}
    </h2>
    @if($link)
        <a href="{{ $link }}" class="ml-auto text-theme-1 truncate flex items-center">
            <i data-feather="{{ $link_icon }}" class="w-4  me-2 stroke-2"></i>
            {{$link_text}} </a>
    @endif
</div>
