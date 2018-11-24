<?php

namespace Modules\Core\Entities;

use Modules\Core\Presenters\AddressPresenter;
use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;

class Address extends Model
{
    use PresentableTrait;

    protected $presenter = AddressPresenter::class;

    protected $fillable = [
        'line_1',
        'line_2',
        'city',
        'postcode'
    ];

    public function addressable()
    {
        return $this->morphTo('addressable');
    }
}
