<?php

namespace App\Policies;

use App\Models\Supervisor;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SupervisorPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return $user->user_role != 'User';
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Supervisor  $supervisor
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Supervisor $supervisor)
    {
        return $user->user_role != 'User';
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return  in_array($user->user_role, ['Admin', 'Super Admin']);
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Supervisor  $supervisor
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Supervisor $supervisor)
    {
        return $user->user_role == 'Admin' || $user->id == $supervisor->user->id;;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Supervisor  $supervisor
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Supervisor $supervisor)
    {
        return $user->user_role == 'Super Admin';
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Supervisor  $supervisor
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Supervisor $supervisor)
    {
        return $user->user_role == 'Super Admin';
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Supervisor  $supervisor
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Supervisor $supervisor)
    {
        return false;
    }
}
