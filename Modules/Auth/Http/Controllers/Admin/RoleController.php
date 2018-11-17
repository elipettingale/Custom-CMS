<?php

namespace Modules\Auth\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Joshbrw\LaravelPermissions\Contracts\PermissionManager;
use Modules\Audit\Services\Audit;
use Modules\Auth\Entities\Role;
use Modules\Auth\Http\Requests\Admin\Role\StoreRoleRequest;
use Modules\Auth\Http\Requests\Admin\Role\UpdateRoleRequest;
use Modules\Auth\Managers\RoleManager;
use Modules\Auth\Repositories\RoleRepository;
use Modules\Core\Services\MessageFactory;

class RoleController extends Controller
{
    private $roleRepository;
    private $roleManager;
    private $permissionManager;

    public function __construct(RoleRepository $roleRepository, RoleManager $roleManager, PermissionManager $permissionManager)
    {
        $this->roleRepository = $roleRepository;
        $this->roleManager = $roleManager;
        $this->permissionManager = $permissionManager;

        register_breadcrumb('Admin', null);
        register_breadcrumb('Roles', route('admin.roles.index'));
    }

    public function index(): View
    {
        authorize('list', Role::class);

        return view('auth::admin.role.index', [
            'roles' => $this->roleRepository->getAdminListing()
        ]);
    }

    public function create(Request $request): View
    {
        authorize('create', Role::class);

        register_breadcrumb('Create New Role', route('admin.roles.create'));

        if ($request->get('advanced') === 'true') {
            $permissions = $this->permissionManager->all()[0];
        } else {
            $permissions = $this->permissionManager->all()[1];
        }

        return view('auth::admin.role.create', [
            'role' => $this->roleRepository->createNewInstance(),
            'permissions' => $permissions
        ]);
    }

    public function store(StoreRoleRequest $request): RedirectResponse
    {
        authorize('create', Role::class);

        $response = $this->roleManager->create($request->all());

        if (!$response->wasSuccessful()) {
            return redirect()->back()
                ->with('error', MessageFactory::entityNotCreated('Role', $response->getErrors()));
        }

        $role = $response->getData('role');

        Audit::auditable($role)
            ->withMessage('auth::audit.role.created', [
                'role' => $role->name
            ]);

        return redirect()->route('admin.roles.edit', $role->id)
            ->with('success', MessageFactory::entityCreated('Role'));
    }

    public function edit(Request $request, Role $role): View
    {
        authorize('edit', $role);

        register_breadcrumb("Edit Role: {$role->present()->fullName}", route('admin.roles.edit', $role->id));

        if ($request->get('advanced') === 'true') {
            $permissions = $this->permissionManager->all()[0];
        } else {
            $permissions = $this->permissionManager->all()[1];
        }

        return view('auth::admin.role.edit', [
            'role' => $role,
            'permissions' => $permissions
        ]);
    }

    public function update(UpdateRoleRequest $request, Role $role): RedirectResponse
    {
        authorize('edit', $role);

        $response = $this->roleManager->update($role, $request->all());

        if (!$response->wasSuccessful()) {
            return redirect()->back()
                ->with('error', MessageFactory::entityNotUpdated('Role', $response->getErrors()));
        }

        Audit::auditable($role)
            ->withMessage('auth::audit.role.updated', [
                'role' => $role->name
            ]);

        return redirect()->back()
            ->with('success', MessageFactory::entityUpdated('Role'));
    }

    public function destroy(Role $role): RedirectResponse
    {
        authorize('delete', $role);

        if (!$this->roleRepository->delete($role)) {
            return redirect()->back()
                ->with('error', MessageFactory::entityNotDeleted('Role'));
        }

        Audit::auditable($role)
            ->withMessage('auth::audit.role.deleted', [
                'role' => $role->name
            ]);

        return redirect()->back()
            ->with('success', MessageFactory::entityDeleted('Role'));
    }
}
