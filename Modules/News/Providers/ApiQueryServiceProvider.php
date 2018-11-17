<?php

namespace Modules\News\Providers;

use EliPett\ApiQueryLanguage\Services\ApiQueryLanguage;
use Illuminate\Support\ServiceProvider;
use Modules\News\Entities\Post;
use Modules\News\Entities\PostCategory;
use Modules\News\Transformers\PostCategoryTransformer;
use Modules\News\Transformers\PostTransformer;

class ApiQueryServiceProvider extends ServiceProvider
{
    public function boot(ApiQueryLanguage $apiQueryLanguage)
    {
        $apiQueryLanguage->register([
            'entity_path' => Post::class,
            'transformer_path' => PostTransformer::class,
            'permission_callback' => function() {
                return true;
            }
        ]);

        $apiQueryLanguage->register([
            'entity_path' => PostCategory::class,
            'transformer_path' => PostCategoryTransformer::class,
            'permission_callback' => function() {
                return true;
            }
        ]);
    }
}
