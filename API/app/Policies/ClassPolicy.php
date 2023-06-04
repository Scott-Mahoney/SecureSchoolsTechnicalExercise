<?php

namespace App\Policies;

use App\Models\Classes;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ClassPolicy
{
    /**
     * Determine whether the user can view a given class
     * Should return the same deny message regardless of if the user is just missing the permission, or if the class does not exist
     *
     * @param User $user The current user
     * @param Classes|null $class The class to check permissions for
     *
     */
    public function view(User $user, Classes $class): Response
    {
        //Permission checks for user go here
        $permitted = true;

        return $permitted && $class !== null
            ? Response::allow()
            : Response::deny('You do not have permissions to view this class');
    }
}
