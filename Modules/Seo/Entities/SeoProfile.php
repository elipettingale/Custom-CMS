<?php

namespace Modules\Seo\Entities;

use App\Entities\Model;
use Laracasts\Presenter\PresentableTrait;
use Modules\Seo\Presenters\SeoProfilePresenter;

class SeoProfile extends Model
{
    use PresentableTrait;

    protected $presenter = SeoProfilePresenter::class;

    protected $fillable = [
        'title',
        'description'
    ];
}
