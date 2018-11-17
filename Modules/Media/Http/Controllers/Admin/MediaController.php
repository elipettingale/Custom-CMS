<?php

namespace Modules\Media\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Request;
use Illuminate\Http\RedirectResponse;
use Modules\Media\Managers\MediaManager;

class MediaController extends Controller
{
    private $mediaManager;

    public function __construct(MediaManager $mediaManager)
    {
        $this->mediaManager = $mediaManager;
    }

    public function replace(Request $request): RedirectResponse
    {
        if (!$entity = $request->morph('entity')) {
            abort(404);
        }

        $response = $this->mediaManager->replaceMany(
            $entity,
            $request->file('media_files'),
            $request->get('media_collection')
        );

        $url = redirect()->back()->getTargetUrl() . '#' . $request->get('media_collection');

        if (!$response->wasSuccessful()) {
            return redirect()->to($url)
                ->with('error',  trans_error('media::messages.error.media-uploaded', [
                    'errors' => $response->getErrors()
                ]));
        }

        return redirect()->to($url)
            ->with('success', trans('media::messages.success.media-uploaded'));
    }
}
