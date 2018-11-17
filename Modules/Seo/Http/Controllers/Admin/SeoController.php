<?php

namespace Modules\Seo\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Seo\Contracts\HasSeoProfile;
use Modules\Seo\Entities\SeoProfile;
use Modules\Seo\Managers\SeoProfileManager;
use Modules\Seo\Repositories\SeoProfileRepository;
use Modules\Seo\Services\EntitySeoConfigFactory;

class SeoController extends Controller
{
    private $seoProfileRepository;
    private $seoProfileManager;

    private $config;

    public function __construct(SeoProfileRepository $seoProfileRepository, SeoProfileManager $seoProfileManager)
    {
        $this->seoProfileRepository = $seoProfileRepository;
        $this->seoProfileManager = $seoProfileManager;
    }

    private function loadConfig(HasSeoProfile $entity)
    {
        $this->config = EntitySeoConfigFactory::make($entity);
    }

    public function edit(HasSeoProfile $entity)
    {
        authorize('edit', SeoProfile::class);

        $this->loadConfig($entity);

        register_breadcrumb(upper_case($this->config['module']), null);
        register_breadcrumb(upper_case($this->config['module']), route('admin.' . lower_hyphen_case($this->config['entity_plural']) . '.index'));

        register_breadcrumb('Edit ' . upper_case($this->config['entity']) . ': ' . $this->config['identifier'], route('admin.' . lower_hyphen_case($this->config['entity_plural']) . '.edit', $entity->id));
        register_breadcrumb('Edit ' . upper_case($this->config['entity']) . ' Seo: ' . $this->config['identifier'], route('admin.' . lower_hyphen_case($this->config['entity_plural']) . '.seo.edit', $entity->id));

        return view('seo::admin.seo-profile.edit', [
            'entity' => $entity,
            'seoProfile' => $this->seoProfileRepository->findOrNew($entity),
            'config' => [
                'entity' => upper_case($this->config['entity']),
                'entity_plural' => upper_case($this->config['entity_plural']),
                'identifier' => $this->config['identifier']
            ]
        ]);
    }

    public function update(HasSeoProfile $entity, Request $request)
    {
        authorize('edit', SeoProfile::class);

        $this->loadConfig($entity);

        if (!$this->seoProfileManager->createOrUpdate($entity, $request->all())) {
            return redirect()->back()
                ->with('error', trans_error('messages.error.entity-updated', ['entity' => upper_case($this->config['entity'])]));
        }

        return redirect()->back()
            ->with('success', trans('messages.success.entity-updated', ['entity' => upper_case($this->config['entity'])]));
    }
}
