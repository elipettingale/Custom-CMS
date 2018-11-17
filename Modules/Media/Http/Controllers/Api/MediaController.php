<?php

namespace Modules\Media\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Request;
use Illuminate\Http\JsonResponse;
use Modules\Media\Managers\MediaManager;

class MediaController extends Controller
{
    private $mediaManager;

    public function __construct(MediaManager $mediaManager)
    {
        $this->mediaManager = $mediaManager;
    }

    public function add(Request $request): JsonResponse
    {
        if (!$entity = $request->morph('entity')) {
            return new JsonResponse([
                'success' => false,
                'errorMessage' => trans_error('media::messages.error.media-uploaded')
            ]);
        }

        $response = $this->mediaManager->addMany(
            $entity,
            $request->file('media_files'),
            $request->get('media_collection')
        );

        if (!$response->wasSuccessful()) {
            return new JsonResponse([
                'success' => false,
                'errorMessage' => trans_error('media::messages.error.media-uploaded', [
                    'errors' => $response->getErrors()
                ])
            ]);
        }

        /** @var array $media */
        $media = $response->getData('media');

        return new JsonResponse([
            'success' => true,
            'url' => $media[0]->getFullUrl()
        ]);
    }
}
