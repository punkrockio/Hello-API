<?php

namespace App\Containers\User\Policies;

use App\Kernel\Policy\Abstracts\Policy;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Containers\User\Models\User;

/**
 * Class UserPolicy.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
class UserPolicy extends Policy
{

    use HandlesAuthorization;

    /**
     * Determine if the user is updating himself and not another user.
     *
     * @param \App\Containers\User\Models\User $user
     * @param                                $inputUserId
     *
     * @return bool
     */
    public function update(User $user, $inputUserId)
    {
        // authorize only if a user is updating it's own records
        return ($user->id === $inputUserId) ? true : false;
    }

    /**
     * Determine if the user is deleting himself and not another user.
     *
     * @param \App\Containers\User\Models\User $user
     * @param                                $inputUserId
     *
     * @return bool
     */
    public function delete(User $user, $inputUserId)
    {
        // authorize only if a user is deleting it's own records
        return ($user->id === $inputUserId) ? true : false;
    }
}
