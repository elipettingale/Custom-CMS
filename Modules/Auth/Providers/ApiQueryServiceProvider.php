<?php

namespace Modules\Auth\Providers;

use EliPett\ApiQueryLanguage\Services\ApiQueryLanguage;
use Illuminate\Support\ServiceProvider;
use Modules\Auth\Entities\User;
use Modules\Auth\Transformers\UserTransformer;

class ApiQueryServiceProvider extends ServiceProvider
{
    public function boot(ApiQueryLanguage $apiQueryLanguage)
    {
        $apiQueryLanguage->register([
            'entity_path' => User::class,
            'transformer_path' => UserTransformer::class,
            'permission_callback' => function() {
                return true;
            }
        ]);
    }
}
