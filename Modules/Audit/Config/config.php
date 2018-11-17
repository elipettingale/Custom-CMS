<?php

use Modules\Auth\Entities\User;
use Modules\Settings\Entities\Setting;
use Modules\Auth\Entities\Role;

return [

    'name' => 'Audit',

    'auditable-types' => [
        User::class => 'User',
        Setting::class => 'Setting',
        Role::class => 'Role',
    ]

];
