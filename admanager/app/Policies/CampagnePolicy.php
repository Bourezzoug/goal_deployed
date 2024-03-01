<?php

namespace App\Policies;

use App\Models\Campagne;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CampagnePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user)
    {
        return $user->hasPermission('browse_campagnes');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Campagne $campagne)
    {
        return $user->hasPermission('read_campagnes');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user)
    {
        return $user->hasPermission('add_campagnes');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Campagne $campagne)
    {
        return $user->hasPermission('edit_campagnes');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Campagne $campagne)
    {
        return $user->hasPermission('delete_campagnes');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Campagne $campagne)
    {
        return $user->hasPermission('restore_campagnes');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Campagne $campagne)
    {
        return $user->hasPermission('forceDelete_campagnes');
    }
    public function deleteAll(User $user)
    {
        return $user->hasPermission('deleteAll_campagnes');
    }
}
