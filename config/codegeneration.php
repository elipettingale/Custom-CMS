<?php

return [

    'should-persist-parameters' => true,

    'stub-directory' => __DIR__ . '/../resources/stubs',

    'factories' => [
        'generator' => \App\Services\GeneratorFactory::class,
        'stub' => \App\Services\StubFactory::class
    ],

    'generator-aliases' => [
        'resource-controller' => 'admin-resource-controller',
        'arc' => 'admin-resource-controller',
        'entity' => 'entity-with-presenter',
        'ewp' => 'entity-with-presenter',
        'repository' => 'eloquent-repository',
        'er' => 'eloquent-repository',
        'resource-views' => 'admin-resource-views',
        'arv' => 'admin-resource-views',
        'transformer' => 'entity-transformer',
        'et' => 'entity-transformer',
        'o' => 'observer',
        'cm' => 'create-migration',
        'ee' => 'entity-event',
        'eel' => 'entity-event-listener',
        'listener' => 'event-listener',
        'cvc' => 'cached-view-composer',
        'ssp' => 'settings-service-provider',
        'psp' => 'permission-service-provider',
        'esp' => 'event-service-provider',
        'nsp' => 'navigation-service-provider',
        'csp' => 'command-service-provider'
    ]

];
