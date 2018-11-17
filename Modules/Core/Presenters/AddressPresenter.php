<?php

namespace Modules\Core\Presenters;

use Laracasts\Presenter\Presenter;

class AddressPresenter extends Presenter
{
    public function fullAddress()
    {
        $pieces = collect([
            $this->entity->line_1,
            $this->entity->line_2,
            $this->entity->city,
            $this->entity->postcode
        ])->reject(function($piece) {
           return $piece === null;
        });

        return implode(', ', $pieces->toArray());
    }
}
