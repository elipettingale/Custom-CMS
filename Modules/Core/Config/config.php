<?php

use Modules\Core\Enums\Status;

return [

    'name' => 'Core',

    'statuses' => [
        Status::DRAFT => [
            'label' => 'Draft',
            'text' => 'dark',
            'background' => 'warning'
        ],
        Status::LIVE => [
            'label' => 'Live',
            'text' => 'white',
            'background' => 'success'
        ]
    ]

];
