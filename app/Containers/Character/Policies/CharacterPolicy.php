<?php

namespace App\Containers\Character\Policies;

use App\Containers\Character\Models\Character;
use App\Containers\User\Models\User;
use App\Ship\Parents\Policies\Policy;

class CharacterPolicy extends Policy
{
    /**
     * @param User $user
     * @param Character $character
     * @return bool
     */
    public function delete(User $user, Character $character): bool
    {
        return $this->isOwner($user, $character);
    }

    /**
     * @param User $user
     * @param Character $character
     * @return bool
     */
    public function update(User $user, Character $character): bool
    {
        return $this->isOwner($user, $character);
    }

    /**
     * @param User $user
     * @param Character $character
     * @return bool
     */
    public function show(User $user, Character $character): bool
    {
        return $this->isOwner($user, $character);
    }

    /**
     * @param User $user
     * @param Character $character
     * @return bool
     */
    public function isOwner(User $user, Character $character): bool
    {
        return $user->id === $character->user_id;
    }
}