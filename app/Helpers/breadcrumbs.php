<?php

use Illuminate\Support\Facades\Route;

if (!function_exists('getBreadcrumbs')) {
    function getBreadcrumbs(array $menuRoutes = [])
    {
        $currentRoute = Route::currentRouteName();

        $breadcrumbs = [
            'Dashboard' => route('user.dashboard'), // always include Dashboard
        ];

        foreach ($menuRoutes as $parent => $routes) {
            if (array_key_exists($currentRoute, $routes)) {
                $breadcrumbs[$parent] = '#';
                $breadcrumbs[$routes[$currentRoute]] = '';
                break;
            }
        }

        return $breadcrumbs;
    }
}

if (!function_exists('isActiveMenu')) {
    function isActiveMenu(array $routes)
    {
        $currentRoute = Route::currentRouteName();
        return in_array($currentRoute, array_keys($routes));
    }
}
