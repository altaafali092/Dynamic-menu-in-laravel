<?php

use App\Models\Menu;

if (!function_exists('getMenuTree')) {
    function getMenuTree()
    {
        return Menu::with('children')->whereNull('parent_id')->get();
    }
}
