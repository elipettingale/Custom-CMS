<?php

namespace Modules\News\Entities;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;
use Modules\News\Presenters\PostCategoryPresenter;

class PostCategory extends Model
{
    use PresentableTrait, Sluggable;

    protected $presenter = PostCategoryPresenter::class;

    protected $fillable = [
        'name'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function posts()
    {
        return $this->hasMany(Post::class, 'category_id');
    }
}
