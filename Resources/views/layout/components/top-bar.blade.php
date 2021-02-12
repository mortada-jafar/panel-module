<!-- BEGIN: Top Bar -->
<div class="top-bar">
    <!-- BEGIN: Breadcrumb -->

    @include('panel_ui::common.partials.breadcrumbs',['breadcrumbs'=>isset($meta) ? $meta->getBreadcrumbs() : (isset($form) ? $form->getBreadcrumbs(): $data->getBreadcrumbs()) ])
    <div class="flex-auto"></div>
    <!-- END: Breadcrumb -->
    <!-- BEGIN: Search -->
    <div class="intro-x relative mx-6">
        <div class="search hidden sm:block">
            <input type="text" id="search-input" class="search__input input placeholder border-theme-primary"
                   placeholder="@lang('panel_ui::panel.search')...">
            <i data-feather="search" class="search__icon"></i>
        </div>
        <div class="search-result">
            <ul class="search-result__content overflow-y-auto" >
                <p class="text-muted text-center text-info" style="display: none" id="empty-search-element">هیچ داده
                    وحود ندارد</p>
                @foreach ($side_menu as $menu)
                    @if ( $menu != 'devider')
                        <li >
                            @if(isset($menu['route']))
                                <a href="{{ route($menu['route']) }}" class="flex items-center mt-2 parent-search-element"
                                   data-title="{{ $menu['title'] }}">
                                    <span
                                        class=" p-1 rounded-full w-6 h-6 flex items-center justify-center bg-theme-primary text-white">
                                <i data-feather="{{$menu['icon']}}"></i>
                            </span>
                                    <div class="search-result__content__title my-3">{{ $menu['title'] }}</div>
                                </a>

                            @else
                                <div class="search-result__content__title my-3 parent-search-element"
                                     data-title="{{ $menu['title'] }}">{{ $menu['title'] }}</div>
                            @endif
                            @if (isset($menu['sub_menu']))
                                <ul>
                                    @foreach ($menu['sub_menu'] as $subMenu)
                                        <a href="{{ route($subMenu['route']) }}"
                                           class="flex items-center mt-2 child-search-element"
                                           data-title="{{ $subMenu['title'] }}">
                                            <div class="w-8 h-8 image-fit">
                                                @if(isset($subMenu['icon']) && $subMenu['icon'])
                                                    <span
                                                        class=" p-1 rounded-full w-6 h-6 flex items-center justify-center bg-theme-primary text-white">
                                        <i data-feather="{{$subMenu['icon']}}"></i>
                                        </span>
                                                @else
                                                    <span
                                                        class=" p-1 rounded-full w-6 h-6 flex items-center justify-center bg-theme-primary text-white">
                                        <i data-feather="activity"></i>
                                        </span>
                                                @endif
                                            </div>
                                            <div class="ml-3">{{  $subMenu['title'] }}</div>
                                        </a>
                                    @endforeach
                                </ul>
                            @endif
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>
    </div>
    <!-- END: Search -->
    <!-- BEGIN: Notifications -->
    <div class="intro-x dropdown relative mx-6">
        <div class="dropdown-toggle notification notification--bullet cursor-pointer">
            <i data-feather="bell" class="notification__icon"></i>
        </div>
        <div
            class="notification-content dropdown-box mt-8 absolute top-0 end-0 sm:bottom-auto sm:end-0 z-20 -ml-10 sm:ml-0">
            <div class="notification-content__box dropdown-box__content box">
                <div class="notification-content__title">Notifications</div>
{{--                @foreach (array_slice($fakers, 0, 5) as $key => $faker)--}}
{{--                    <div class="cursor-pointer relative flex items-center {{ $key ? 'mt-5' : '' }}">--}}
{{--                        <div class="w-12 h-12 flex-none image-fit mr-1">--}}
{{--                            <img alt="Midone Laravel Admin Dashboard Starter Kit" class="rounded-full"--}}
{{--                                 src="{{ asset('dist/images/' . $faker['photos'][0]) }}">--}}
{{--                            <div--}}
{{--                                class="w-3 h-3 bg-theme-9 absolute right-0 end2-0 rounded-full border-2 border-white"></div>--}}
{{--                        </div>--}}
{{--                        <div class="ml-2 overflow-hidden">--}}
{{--                            <div class="flex items-center">--}}
{{--                                <a href="javascript:;"--}}
{{--                                   class="font-medium truncate mr-5">{{ $faker['users'][0]['name'] }}</a>--}}
{{--                                <div--}}
{{--                                    class="text-xs text-gray-500 ms-auto whitespace-no-wrap">{{ $faker['times'][0] }}</div>--}}
{{--                            </div>--}}
{{--                            <div class="w-full truncate text-gray-600">{{ $faker['news'][0]['short_content'] }}</div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                @endforeach--}}
            </div>
        </div>
    </div>
    <!-- END: Notifications -->
    <!-- BEGIN: Account Menu -->
    <div class="intro-x dropdown w-8 h-8 relative">
        <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in">
            <img alt="Midone Laravel Admin Dashboard Starter Kit"
                 src="{{ auth('admin')->user()->avatar_pic}}">
        </div>
        <div class="dropdown-box mt-10 absolute w-56 top-0 end-0 z-20">
            <div class="dropdown-box__content box bg-theme-secondary text-white">
                <div class="p-4 border-b border-theme-secondary-secondaryLight">
                    <div class="font-medium">{{ auth('admin')->user()->name }}</div>
                    <div class="text-xs text-theme-danger">{{ auth('admin')->user()->role->name }}</div>
                </div>
                <div class="p-2">
                    <a href="{{ route('admin-profile') }}"
                       class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-primary rounded-md">
                        <i data-feather="user" class="w-4 h-4 me-2"></i> @lang("panel_ui::panel.my_profile")
                    </a>
{{--                    <a href=""--}}
{{--                       class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-primary rounded-md">--}}
{{--                        <i data-feather="lock" class="w-4 h-4 me-2"></i> @lang("panel_ui::panel.change_pass")--}}
{{--                    </a>--}}
                </div>
                <div class="p-2 border-t border-theme-secondaryLight">
                    <a href="{{ route('panel.logout') }}"
                       class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-primary rounded-md">
                        <i data-feather="toggle-right" class="w-4 h-4 me-2"></i> @lang("panel_ui::panel.logout")
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Account Menu -->
</div>
<!-- END: Top Bar -->
