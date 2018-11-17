<?php

namespace Modules\Core\Services;

class Policy
{
    protected $prefix;

    public function all($user): bool
    {
        return $user->hasAccess("$this->prefix.all");
    }

    public function __call($name, $arguments): bool
    {
       $user = $arguments[0];

       if ($this->all($user)) {
           return true;
       }

       return $user->hasAccess("$this->prefix.$name");
    }
}
