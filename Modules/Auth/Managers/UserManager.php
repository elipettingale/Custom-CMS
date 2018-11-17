<?php

namespace Modules\Auth\Managers;

use Modules\Core\Services\Manager;
use Modules\Core\ValueObjects\ManagerResponse;
use Cartalyst\Sentinel\Activations\IlluminateActivationRepository as ActivationRepository;
use Modules\Auth\Entities\User;
use Modules\Auth\Repositories\UserRepository;

class UserManager extends Manager
{
    private $userRepository;
    private $activationRepository;

    public function __construct(UserRepository $userRepository, ActivationRepository $activationRepository)
    {
        $this->userRepository = $userRepository;
        $this->activationRepository = $activationRepository;
    }

    public function create(array $data): ManagerResponse
    {
        $this->begin();

        $user = $this->call(
            $this->userRepository->create($data), 'user'
        );

        $this->call(
            $this->userRepository->syncRoles($user, array_get($data, 'roles', []))
        );

        $activation = $this->call(
            $this->activationRepository->create($user)
        );

        $this->call(
            $this->activationRepository->complete($user, $activation->getCode())
        );

        return $this->complete();
    }

    public function update(User $user, array $data): ManagerResponse
    {
        $this->begin();

        $this->call(
            $this->userRepository->update($user, $data)
        );

        $this->call(
            $this->userRepository->syncRoles($user, array_get($data, 'roles', []))
        );

        return $this->complete();
    }
}
