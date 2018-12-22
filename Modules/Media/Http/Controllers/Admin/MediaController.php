<?php

namespace Modules\Media\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Request;
use Illuminate\Http\RedirectResponse;
use Modules\Media\Managers\MediaManager;
use Modules\Core\ValueObjects\ManagerResponse;

class MediaController extends Controller
{
    private $mediaManager;

    public function __construct(MediaManager $mediaManager)
    {
        $this->mediaManager = $mediaManager;
    }

    private function handle(Request $request, callable $method): RedirectResponse
    {
        if (!$entity = $request->morph('entity')) {
            abort(404);
        }

        /** @var ManagerResponse $response */
        $response = $method(
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

    public function add(Request $request): RedirectResponse
    {
        return $this->handle($request, function($entity, $files, $collection) {
            return $this->mediaManager->addMany($entity, $files, $collection);
        });
    }

    public function replace(Request $request): RedirectResponse
    {
        return $this->handle($request, function($entity, $files, $collection) {
            return $this->mediaManager->replaceMany($entity, $files, $collection);
        });
    }
}
