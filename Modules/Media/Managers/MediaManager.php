<?php

namespace Modules\Media\Managers;

use Modules\Core\Services\Manager;
use Modules\Core\ValueObjects\ManagerResponse;
use Illuminate\Http\UploadedFile;
use Modules\Media\Repositories\MediaRepository;
use Spatie\MediaLibrary\HasMedia\HasMedia;

class MediaManager extends Manager
{
    private $mediaRepository;
    
    public function __construct(MediaRepository $mediaRepository)
    {
        $this->mediaRepository = $mediaRepository;
    }

    private function update(array $data): ManagerResponse
    {
        $this->begin();

        if ($data['should_clear']) {
            $this->call(
                $this->mediaRepository->clear($data['entity'], $data['media_collection'])
            );
        }

        foreach ($data['files'] as $file) {
            $this->call(
                $this->mediaRepository->add($data['entity'], $file, $data['media_collection']), 'media[]'
            );
        }

        return $this->complete();
    }

    public function add(HasMedia $entity, UploadedFile $file, string $collection): ManagerResponse
    {
        return $this->update([
            'entity' => $entity,
            'files' => [$file],
            'media_collection' => $collection,
            'should_clear' => false
        ]);
    }

    public function addMany(HasMedia $entity, array $files, string $collection): ManagerResponse
    {
        return $this->update([
            'entity' => $entity,
            'files' => $files,
            'media_collection' => $collection,
            'should_clear' => false
        ]);
    }

    public function replace(HasMedia $entity, UploadedFile $file, string $collection): ManagerResponse
    {
        return $this->update([
            'entity' => $entity,
            'files' => [$file],
            'media_collection' => $collection,
            'should_clear' => true
        ]);
    }

    public function replaceMany(HasMedia $entity, array $files, string $collection): ManagerResponse
    {
        return $this->update([
            'entity' => $entity,
            'files' => $files,
            'media_collection' => $collection,
            'should_clear' => true
        ]);
    }
}
