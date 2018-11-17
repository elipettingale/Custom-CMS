<?php

namespace Modules\Content\Repositories;

use Modules\Core\ValueObjects\KeyValuePair;
use Illuminate\Support\Collection;

interface PageTemplateRepository
{
    public function createNewInstance(): KeyValuePair;
    public function findOrNew(?string $key): KeyValuePair;
    public function getAll(): Collection;
}
