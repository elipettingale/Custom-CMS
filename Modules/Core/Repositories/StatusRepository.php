<?php

namespace Modules\Core\Repositories;

use Modules\Core\ValueObjects\Status;
use Illuminate\Support\Collection;

interface StatusRepository
{
    public function find(string $key): ?Status;
    public function getAll(): Collection;
}
