<?php

namespace Modules\Auth\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Modules\Audit\Services\Audit;
use Modules\Auth\Http\Requests\Admin\Profile\UpdateProfilePasswordRequest;
use Modules\Auth\Http\Requests\Admin\Profile\UpdateProfileRequest;
use Modules\Auth\Repositories\UserRepository;
use Modules\Core\Services\MessageFactory;
use Modules\Settings\Managers\UserSettingRepositoryManager;

class ProfileController extends Controller
{
    private $userRepository;
    private $settings;
    private $settingRepositoryManager;

    public function __construct(UserRepository $userRepository, UserSettingRepositoryManager $settingRepositoryManager)
    {
        $this->userRepository = $userRepository;
        $this->settings = app('user-settings');
        $this->settingRepositoryManager = $settingRepositoryManager;
    }

    public function edit(): View
    {
        register_breadcrumb('My Profile', route('admin.profile.edit'));

        return view('auth::admin.profile.edit', [
            'user' => current_user()
        ]);
    }

    public function editSettings(): View
    {
        register_breadcrumb('My Profile', route('admin.profile.edit'));
        register_breadcrumb('My Settings', route('admin.profile.edit'));

        return view('auth::admin.profile.edit-settings', [
            'settings' => $this->settings->getSettings()
        ]);
    }

    public function update(UpdateProfileRequest $request): RedirectResponse
    {
        if (!$this->userRepository->update(current_user(), $request->all())) {
            return redirect()->back()
                ->with('error', MessageFactory::entityNotUpdated('Profile'));
        }

        Audit::auditable(current_user())
            ->withMessage('auth::audit.user.updated', [
                'user' => current_user()->present()->fullName
            ]);

        return redirect()->route('admin.profile.edit')
            ->with('success', MessageFactory::entityUpdated('Profile'));
    }

    public function updatePassword(UpdateProfilePasswordRequest $request): RedirectResponse
    {
        if (!$this->userRepository->updatePassword(current_user(), $request->get('password'))) {
            return redirect()->back()
                ->with('error', MessageFactory::entityNotUpdated('Password'));
        }

        Audit::auditable(current_user())
            ->withMessage('auth::audit.user.updated-password', [
                'user' => current_user()->present()->fullName
            ]);

        return redirect()->route('admin.profile.edit')
            ->with('success', MessageFactory::entityUpdated('Password'));
    }

    public function updateSettings(Request $request): RedirectResponse
    {
        if (!$this->settingRepositoryManager->updateAll(current_user(), $request->get('settings', []))) {
            return redirect()->back()
                ->with('error', MessageFactory::entityNotUpdated('Settings'));
        }

        return redirect()->back()
            ->with('success', MessageFactory::entityUpdated('Settings'));
    }
}
