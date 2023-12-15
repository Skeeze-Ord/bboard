<?php

namespace App\Policies;

use App\Models\Bb;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BbPolicy
{
    use HandlesAuthorization;

    /**
     * Rights for editing
     *
     * @param User $user
     * @param Bb $bb
     * @return bool
     */
    public function update(User $user, Bb $bb): bool
    {
        return $bb->user->id === $user->id;
    }

    /**
     * Rights for deleting
     * @param User $user
     * @param Bb $bb
     * @return bool
     */
    public function destroy(User $user, Bb $bb): bool
    {
        return $this->update($user, $bb);
    }
}
