<?php

namespace Modules\Media\Repositories\Eloquent;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;
use Modules\Media\Repositories\MediaRepository;
use Spatie\MediaLibrary\Exceptions\FileCannotBeAdded;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\Models\Media;

class EloquentMediaRepository implements MediaRepository
{
    public function add(HasMedia $entity, UploadedFile $uploadedFile, string $mediaCollection): Media
    {
        try {

            return $entity->addMedia($uploadedFile)
                ->toMediaCollection($mediaCollection);

        } catch (FileCannotBeAdded $exception) {
            return null;
        }
    }

    public function clear(HasMedia $entity, string $mediaCollection): bool
    {
        if ($entity->clearMediaCollection($mediaCollection)) {
            return true;
        }

        return false;
    }

    public function copy(HasMedia $entity, string $imagePath, string $mediaCollection): Media
    {
        try {

            return $entity->copyMedia($imagePath)
                ->toMediaCollection($mediaCollection);

        } catch (FileCannotBeAdded $exception) {
            return null;
        }
    }

    public function move(Media $media, HasMedia $newOwner): bool
    {
        $media->model_id = $newOwner->id;
        $media->model_type = \get_class($newOwner);

        return $media->save();
    }
}
