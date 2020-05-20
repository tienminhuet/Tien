<?php

namespace App\Policies;

use App\Models\RegistrationGroup;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RegistrationGroupPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->super_user == 1;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\RegistrationGroupPolicy  $registrationGroupPolicy
     * @return mixed
     */
    public function view(User $user, RegistrationGroupPolicy $registrationGroupPolicy)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\RegistrationGroupPolicy  $registrationGroupPolicy
     * @return mixed
     */
    public function update(User $user, RegistrationGroupPolicy $registrationGroupPolicy)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\RegistrationGroupPolicy  $registrationGroupPolicy
     * @return mixed
     */
    public function delete(User $user, RegistrationGroupPolicy $registrationGroupPolicy)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\RegistrationGroupPolicy  $registrationGroupPolicy
     * @return mixed
     */
    public function restore(User $user, RegistrationGroupPolicy $registrationGroupPolicy)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\RegistrationGroupPolicy  $registrationGroupPolicy
     * @return mixed
     */
    public function forceDelete(User $user, RegistrationGroupPolicy $registrationGroupPolicy)
    {
        //
    }
}
