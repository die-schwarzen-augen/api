<?php

namespace App\Ship\Parents\Policies;

use Apiato\Core\Abstracts\Policies\Policy as AbstractPolicy;
use App\Containers\User\Models\User;

/**
 * Class Policy.
 *
 * @author  Mahmoud Zalt <mahmoud@zalt.me>
 */
abstract class Policy extends AbstractPolicy
{
    /**
     * Perform pre-authorization checks.
     *
     * @param User $user
     * @param string $ability
     * @return void|bool
     */
    public function before(User $user, $ability): bool
    {
        if ($user->hasAdminRole()) {
            return true;
        }
    }
}
