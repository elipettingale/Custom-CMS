<?php

namespace Modules\Content\Entities;

use Modules\Core\Contracts\HasStatus;
use App\Entities\Model;
use Modules\Core\Traits\HasStatusTrait;
use Modules\Core\ValueObjects\KeyValuePair;
use Cviebrock\EloquentSluggable\Sluggable;
use Laracasts\Presenter\PresentableTrait;
use Modules\Content\Presenters\PagePresenter;
use Modules\Content\Repositories\PageTemplateRepository;
use Modules\Media\Contracts\HasMedia;
use Modules\Media\Traits\HasMediaTrait;
use Modules\Seo\Contracts\HasSeoProfile;
use Modules\Seo\Traits\HasSeoProfileTrait;

class Page extends Model implements HasStatus, HasMedia, HasSeoProfile
{
    use PresentableTrait, Sluggable, HasStatusTrait, HasMediaTrait, HasSeoProfileTrait;

    protected $presenter = PagePresenter::class;

    protected $fillable = [
        'title',
        'template',
        'data'
    ];

    protected $casts = [
        'data' => 'array'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function mediaDefinitions(): array
    {
        return [
            //
        ];
    }

    public function getTemplateAttribute($value): ?KeyValuePair
    {
        return app(PageTemplateRepository::class)->findOrNew($value);
    }

    public function __get($key)
    {
        if ($data = $this->getAttribute('data')) {
            if (\array_key_exists($key, $data)) {
                return $data[$key];
            }
        }

        return parent::__get($key);
    }
}
