<?php

namespace App\Policies;

use App\Models\Client;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ClientPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user)
    {
        return $user->hasPermission('browse_clients');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Client $client)
    {
        return $user->hasPermission('read_clients');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user)
    {
        return $user->hasPermission('add_clients');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Client $client)
    {
        return $user->hasPermission('edit_clients');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Client $client)
    {
        return $user->hasPermission('delete_clients');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Client $client)
    {
        return $user->hasPermission('restore_clients');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Client $client)
    {
        return $user->hasPermission('forceDelete_clients');
    }
    public function deleteAll(User $user)
    {
        return $user->hasPermission('deleteAll_clients');
    }
}
