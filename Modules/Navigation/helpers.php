<?php

use Modules\Navigation\ValueObjects\Breadcrumb;

if (!function_exists('register_breadcrumb'))
{
    function register_breadcrumb(string $title, ?string $link, string $area = 'main-breadcrumbs')
    {
        app($area)->registerItem(new Breadcrumb($title, $link));
    }
}
