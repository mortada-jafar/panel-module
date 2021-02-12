<div class="-intro-x breadcrumb  hidden sm:flex">
    <a href="{{route('panel.dashboard')}}">@lang('panel_ui::menu.dashboard')</a>
    @foreach ($breadcrumbs as $breadcrumb)
        <i data-feather="chevron-right" class="breadcrumb__icon"></i>
        @if (isset($breadcrumb->url) && !$loop->last)
            <a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a>
        @else
            <a href="javascript:;" class="breadcrumb--active">{{ $breadcrumb->title }}</a>
        @endif
    @endforeach
</div>

