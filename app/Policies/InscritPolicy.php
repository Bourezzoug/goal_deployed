<?php

namespace App\Policies;

use App\Models\Inscrit;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class InscritPolicy
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
        return $user->hasPermission('browse_inscrits');
    }
    public function deleteAll(User $user)
    {
        return $user->hasPermission('deleteAll_inscrits');

    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Inscrit  $inscrit
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Inscrit $inscrit)
    {
        return $user->hasPermission('read_inscrits');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->hasPermission('add_inscrits');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Inscrit  $inscrit
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Inscrit $inscrit)
    {
        return $user->hasPermission('edit_inscrits');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Inscrit  $inscrit
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Inscrit $inscrit)
    {
        return $user->hasPermission('delete_inscrits');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Inscrit  $inscrit
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Inscrit $inscrit)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Inscrit  $inscrit
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Inscrit $inscrit)
    {
        //
    }
}
