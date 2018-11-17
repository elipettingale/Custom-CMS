<?php

namespace Modules\Audit\Repositories;

use Illuminate\Support\Collection;

interface AuditableTypesRepository
{
    public function getAll(): Collection;
}
