<?php

namespace App\Policies;

use App\Models\KunciNorma;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class KunciNormaPolicy
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
        return $user->level == 'Admin';
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\KunciNorma  $kunciNorma
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, KunciNorma $kunciNorma)
    {
        return $user->level == 'Admin';
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->level == 'Admin';
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\KunciNorma  $kunciNorma
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, KunciNorma $kunciNorma)
    {
        return $user->level == 'Admin';
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\KunciNorma  $kunciNorma
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, KunciNorma $kunciNorma)
    {
        return $user->level == 'Admin';
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\KunciNorma  $kunciNorma
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, KunciNorma $kunciNorma)
    {
        return $user->level == 'Admin';
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\KunciNorma  $kunciNorma
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, KunciNorma $kunciNorma)
    {
        return $user->level == 'Admin';
    }
}
