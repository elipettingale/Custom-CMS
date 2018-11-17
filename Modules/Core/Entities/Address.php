<?php

namespace Modules\Core\Entities;

use App\Presenters\AddressPresenter;
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
}
