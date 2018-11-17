<?php

namespace Modules\Auth\Transformers;

use EliPett\EntityTransformer\Contracts\EntityTransformer;
use Modules\Auth\Entities\User;

class UserTransformer implements EntityTransformer
{
    /**
     * @param User $user
     * @return array
     */
    public function data($user): array
    {
        return [
            'id' => $user->id,
            'email' => $user->email,
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            'is_active' => $user->isActive(),
            'created_at' => $user->created_at->toDateTimeString()
        ];
    }

    public function relations(): array
    {
        return [
            //
        ];
    }
}
