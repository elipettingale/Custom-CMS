<?php

namespace Modules\Media\Repositories;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\Models\Media;

interface MediaRepository
{
    public function add(HasMedia $entity, UploadedFile $file, string $mediaCollection): Media;
    public function clear(HasMedia $entity, string $mediaCollection): bool;
    public function copy(HasMedia $entity, string $imagePath, string $mediaCollection): Media;
    public function move(Media $media, HasMedia $newOwner): bool;
}
