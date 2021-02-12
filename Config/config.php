<?php

return [
    'name' => 'panel_ui',
    'menu' => [
        [
            'icon' => 'home',
            'layout' => 'side-menu',
            'route' => 'panel.dashboard',
            'title' => trans('panel_ui::menu.dashboard')
        ], [
            'icon' => 'users',
            'layout' => 'side-menu',
            'route' => 'users.index',
            'title' => trans('panel_ui::menu.users')
        ], [
            'icon' => 'user',
            'layout' => 'side-menu',
            'route' => 'employees.index',
            'title' => trans('panel_ui::menu.employees')
        ],

    ],
];
