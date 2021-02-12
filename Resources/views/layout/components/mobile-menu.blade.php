<!-- BEGIN: Mobile Menu -->
<div class="mobile-menu md:hidden">
    <div class="mobile-menu-bar">
        <a href="javascript:;" id="mobile-menu-toggler">
            <i data-feather="bar-chart-2" class="w-8 h-8 text-white transform -rotate-90"></i>
        </a>
        <div class="flex-auto"></div>
        {{--            todo title here--}}
        <a href="{{ url('/') }}" class="flex">
            <img alt="admin panel"  class="w-7" src="{{ asset('dist/images/logo.png') }}">
        </a>

    </div>
    <ul class="border-t border-theme-primary py-5 hidden">
        @foreach ($side_menu as $menu)
            @if ($menu == 'devider')
                <li class="menu__devider my-6"></li>
            @else
                <li>
                    <a href="{{ isset($menu['sub_menu']) ? 'javascript:;' : route($menu['route']) }}"
                       class="menu menu--active">
                        <div class="menu__icon">
                            <i data-feather="{{ $menu['icon'] }}"></i>
                        </div>
                        <div class="menu__title">
                            {{ $menu['title'] }}
                            @if (isset($menu['sub_menu']))
                                <i data-feather="chevron-down" class="menu__sub-icon"></i>
                            @endif
                        </div>
                    </a>
                    @if (isset($menu['sub_menu']))
                        <ul class="menu__sub-open">
                            @foreach ($menu['sub_menu'] as $subMenu)
                                <li>
                                    <a href="{{  route($subMenu['route']) }}"
                                       class="menu ">
                                        <div class="menu__icon">
                                            <i data-feather="activity"></i>
                                        </div>
                                        <div class="menu__title">
                                            {{ $subMenu['title'] }}
                                            @if (isset($subMenu['sub_menu']))
                                                <i data-feather="chevron-down" class="menu__sub-icon"></i>
                                            @endif
                                        </div>
                                    </a>
                                    @if (isset($subMenu['sub_menu']))
                                        <ul class="{{ $second_page_name == $subMenu['route'] ? 'menu__sub-open' : '' }}">
                                            @foreach ($subMenu['sub_menu'] as $lastSubMenu)
                                                <li>
                                                    <a href="{{ route( $lastSubMenu['route']) }}"
                                                       class="menu menu--active">
                                                        <div class="menu__icon">
                                                            <i data-feather="zap"></i>
                                                        </div>
                                                        <div class="menu__title">{{ $lastSubMenu['title'] }}</div>
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </li>
            @endif
        @endforeach
    </ul>
</div>
<!-- END: Mobile Menu -->
