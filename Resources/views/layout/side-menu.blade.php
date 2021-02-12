@extends('panel_ui::layout.main')

@section('head')
    @yield('subhead')
@endsection

@section('content')
    @include('panel_ui::layout.components/mobile-menu')
    <div class="flex">
        <!-- Begin: Side Menu -->
        <nav class="side-nav">
{{--            ps-5 pt-4--}}
            <a href="{{ url('panel') }}" class="intro-x flex items-center ">
                <img class="h-12" alt="admin panel" src="{{ asset('dist/images/logo.png') }}">
            </a>
            <div class="side-nav__devider my-1"></div>
            <ul>

                @foreach ($side_menu as $menu)
                    @if ($menu == 'devider')
                        <li class="side-nav__devider my-6"></li>
                    @else
                        <li>
                            <a href="{{ isset($menu['sub_menu']) ? 'javascript:;' : route($menu['route']) }}"
                               class="side-menu">
                                <div class="side-menu__icon">
                                    <i data-feather="{{ $menu['icon'] }}"></i>
                                </div>
                                <div class="side-menu__title">
                                    {{ $menu['title'] }}
                                    @if (isset($menu['sub_menu']))
                                        <i data-feather="chevron-down" class="side-menu__sub-icon"></i>
                                    @endif
                                </div>
                            </a>
                            @if (isset($menu['sub_menu']))
                                <ul>
                                    @foreach ($menu['sub_menu'] as $subMenu)
                                        <li>
                                            <a href="{{  route($subMenu['route']) }}"
                                               class="side-menu">
                                                <div class="side-menu__icon">
                                                    @if(isset($subMenu['icon']) && $subMenu['icon'])
                                                        <i data-feather="{{$subMenu['icon']}}"></i>
                                                    @else
                                                        <i data-feather="activity"></i>
                                                    @endif
                                                </div>
                                                <div class="side-menu__title">
                                                    {{ $subMenu['title'] }}
                                                    @if (isset($subMenu['sub_menu']))
                                                        <i data-feather="chevron-down" class="side-menu__sub-icon"></i>
                                                    @endif
                                                </div>
                                            </a>
                                            @if (isset($subMenu['sub_menu']))
                                                <ul>
                                                    @foreach ($subMenu['sub_menu'] as $lastSubMenu)
                                                        <li>
                                                            <a href="{{ route( $lastSubMenu['route']) }}"
                                                               class="side-menu">
                                                                <div class="side-menu__icon">
                                                                    <i data-feather="zap"></i>
                                                                </div>
                                                                <div
                                                                    class="side-menu__title">{{ $lastSubMenu['title'] }}</div>
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
        </nav>
        <!-- END: Side Menu -->
        <!-- BEGIN: Content -->
        <div class="content">
            @include('panel_ui::layout.components/top-bar')
            @yield('subcontent')
        </div>
        <!-- END: Content -->
    </div>
@endsection
