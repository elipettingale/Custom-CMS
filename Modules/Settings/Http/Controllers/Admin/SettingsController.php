<?php

namespace Modules\Settings\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Settings\Entities\Setting;
use Modules\Settings\Managers\SettingRepositoryManager;

class SettingsController extends Controller
{
    private $settings;
    private $settingRepositoryManager;

    public function __construct(SettingRepositoryManager $settingRepositoryManager)
    {
        $this->settings = app('settings');
        $this->settingRepositoryManager = $settingRepositoryManager;

        register_breadcrumb('Admin', null);
        register_breadcrumb('Settings', route('admin.settings.edit'));
    }

    public function edit()
    {
        authorize('edit', Setting::class);

        return view('settings::admin.settings.edit', [
            'settings' => $this->settings->getSettings()
        ]);
    }

    public function update(Request $request)
    {
        authorize('edit', Setting::class);

        if (!$this->settingRepositoryManager->updateAll($request->get('settings', []))) {
            return redirect()->back()
                ->with('error', trans_error('messages.error.entity-updated', ['entity' => 'Settings']));
        }

        return redirect()->back()
            ->with('success', trans('messages.success.entity-updated', ['entity' => 'Settings']));
    }
}
