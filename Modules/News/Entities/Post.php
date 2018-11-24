<?php

namespace Modules\News\Entities;

use Modules\Core\Contracts\HasStatus;
use App\Entities\Model;
use Modules\Core\Enums\Status;
use Modules\Core\Traits\HasStatusTrait;
use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laracasts\Presenter\PresentableTrait;
use Modules\Media\Contracts\HasMedia;
use Modules\Media\Enums\MediaConversions;
use Modules\Media\Traits\HasMediaTrait;
use Modules\News\Presenters\PostPresenter;
use Modules\Seo\Contracts\HasSeoProfile;
use Modules\Seo\Traits\HasSeoProfileTrait;

class Post extends Model implements HasMedia, HasStatus, HasSeoProfile
{
    use PresentableTrait, Sluggable, HasStatusTrait, HasMediaTrait, HasSeoProfileTrait;

    protected $presenter = PostPresenter::class;
    protected $identifier = 'title';

    protected $fillable = [
        'title',
        'category_id',
        'content'
    ];

    protected $dates = [
        'published_at'
    ];

    public function mediaDefinitions(): array
    {
        return [
            'featured_image' => [
                'multiple' => false,
                'conversions' => [
                    MediaConversions::THUMB,
                    MediaConversions::WIDE
                ],
                'defaults' => [
                    '*' => 'asset::images/image-upload-placeholder.jpg'
                ]
            ]
        ];
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(PostCategory::class);
    }

    public function setPublishedAtAttribute($value)
    {
        if ($value instanceof Carbon || $value === null) {
            $this->attributes['published_at'] = $value;
        } else {
            $this->attributes['published_at'] = Carbon::createFromFormat('d/m/YH:i', $value['date'] . $value['time']);
        }
    }

    public function scopeWherePublished(Builder $query)
    {
        $query->whereStatus(Status::LIVE)
            ->where('published_at', '<=', Carbon::now());
    }
}
