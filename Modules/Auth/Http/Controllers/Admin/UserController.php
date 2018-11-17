<?php

namespace Modules\Auth\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Modules\Audit\Services\Audit;
use Modules\Auth\Entities\User;
use Modules\Auth\Http\Requests\Admin\User\StoreUserRequest;
use Modules\Auth\Http\Requests\Admin\User\UpdateUserPasswordRequest;
use Modules\Auth\Http\Requests\Admin\User\UpdateUserRequest;
use Modules\Auth\Managers\UserManager;
use Modules\Auth\Repositories\RoleRepository;
use Modules\Auth\Repositories\UserRepository;
use Modules\Core\Services\MessageFactory;

class UserController extends Controller
{
    private $userRepository;
    private $userManager;
    private $roleRepository;

    public function __construct(UserRepository $userRepository, UserManager $userManager, RoleRepository $roleRepository)
    {
        $this->userRepository = $userRepository;
        $this->userManager = $userManager;
        $this->roleRepository = $roleRepository;

        register_breadcrumb('Admin', null);
        register_breadcrumb('Users', route('admin.users.index'));
    }

    public function index(): View
    {
        authorize('list', User::class);

        return view('auth::admin.user.index', [
            'users' => $this->userRepository->getAdminListing(),
            'roles' => $this->roleRepository->getAll()
        ]);
    }

    public function create(): View
    {
        authorize('create', User::class);

        register_breadcrumb('Create New User', route('admin.users.create'));

        return view('auth::admin.user.create', [
            'user' => $this->userRepository->createNewInstance(),
            'roles' => $this->roleRepository->getAll()
        ]);
    }

    public function store(StoreUserRequest $request): RedirectResponse
    {
        authorize('create', User::class);

        $response = $this->userManager->create($request->all());

        if (!$response->wasSuccessful()) {
            return redirect()->back()
                ->with('error', MessageFactory::entityNotCreated('User', $response->getErrors()));
        }

        $user = $response->getData('user');

        Audit::auditable($user)
            ->withMessage('auth::audit.user.created', [
                'user' => $user->present()->fullName
            ]);

        $user = $response->getData('user');

        return redirect()->route('admin.users.edit', $user->id)
            ->with('success', MessageFactory::entityCreated('User'));
    }

    public function edit(User $user): View
    {
        authorize('edit', $user);

        register_breadcrumb("Edit User: {$user->present()->fullName}", route('admin.users.edit', $user->id));

        return view('auth::admin.user.edit', [
            'user' => $user,
            'roles' => $this->roleRepository->getAll()
        ]);
    }

    public function update(User $user, UpdateUserRequest $request): RedirectResponse
    {
        authorize('edit', $user);

        $response = $this->userManager->update($user, $request->all());

        if (!$response->wasSuccessful()) {
            return redirect()->back()
                ->with('error', MessageFactory::entityNotUpdated('User', $response->getErrors()));
        }

        Audit::auditable($user)
            ->withMessage('auth::audit.user.updated', [
                'user' => $user->present()->fullName
            ]);

        return redirect()->back()
            ->with('success', MessageFactory::entityUpdated('User'));
    }

    public function updatePassword(User $user, UpdateUserPasswordRequest $request): RedirectResponse
    {
        authorize('edit', $user);

        if (!$this->userRepository->updatePassword($user, $request->get('password'))) {
            return redirect()->back()
                ->with('error', MessageFactory::entityNotUpdated('User Password'));
        }

        Audit::auditable($user)
            ->withMessage('auth::audit.user.updated-password', [
                'user' => $user->present()->fullName
            ]);

        return redirect()->back()
            ->with('success', MessageFactory::entityUpdated('User Password'));
    }

    public function destroy(User $user): RedirectResponse
    {
        authorize('delete', $user);

        if (!$this->userRepository->delete($user)) {
            return redirect()->back()
                ->with('error', MessageFactory::entityNotDeleted('User'));
        }

        Audit::auditable($user)
            ->withMessage('auth::audit.user.deleted', [
                'user' => $user->present()->fullName
            ]);

        return redirect()->back()
            ->with('success', MessageFactory::entityDeleted('User'));
    }
}
