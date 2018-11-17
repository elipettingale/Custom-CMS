<?php

use Cartalyst\Sentinel\Sentinel;
use Illuminate\Contracts\Auth\Access\Gate;
use Modules\Auth\Services\SessionManager;

if (!function_exists('current_user'))
{
    function current_user()
    {
        return app(Sentinel::class)->getUser();
    }
}

if (!function_exists('gate'))
{
    function gate(): Gate
    {
        return app(Gate::class);
    }
}

if (!function_exists('authorize'))
{
    function authorize($ability, $entity)
    {
        return app(Gate::class)->authorize($ability, $entity);
    }
}

if (!function_exists('user_is_being_impersonated'))
{
    function user_is_being_impersonated(): bool
    {
        return session()->has(SessionManager::SESSION_KEY);
    }
}
