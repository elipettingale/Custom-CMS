<?php

namespace Modules\Auth\Services;

use Cartalyst\Sentinel\Sentinel;
use Modules\Auth\Entities\User;
use Modules\Auth\Repositories\UserRepository;

class SessionManager
{
    private $sentinel;
    private $userRepository;

    public const SESSION_KEY = 'impersonation.original_user_id';

    public function __construct(Sentinel $sentinel, UserRepository $userRepository)
    {
        $this->sentinel = $sentinel;
        $this->userRepository = $userRepository;
    }

    public function impersonateUser(User $user): bool
    {
        if (!session()->get(self::SESSION_KEY)) {
            session()->put(self::SESSION_KEY, current_user()->id);
        }

        $this->sentinel->logout();

        if (!$this->sentinel->login($user)) {
            return false;
        }

        return true;
    }

    public function restoreUser(): bool
    {
        $id = session()->pull(self::SESSION_KEY);
        $user = $this->userRepository->findOrFail($id);

        $this->sentinel->logout();

        if (!$this->sentinel->login($user)) {
            return false;
        }

        return true;
    }

    public function clearImpersonationData(): void
    {
        session()->remove(self::SESSION_KEY);
    }

    public function getOriginalUser(): User
    {
        $id = session()->get(self::SESSION_KEY);

        return $this->userRepository->findOrFail($id);
    }
}
