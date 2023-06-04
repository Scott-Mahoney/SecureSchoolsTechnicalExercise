<?php

namespace App\Policies;

use App\Models\School;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class EmployeePolicy
{
    /**
     * Determine whether the user can view employees for the given school.
     * Should return the same deny message regardless of if the user is just missing the permission, or if the school does not exist
     *
     * @param User $user The current user
     * @param School|null $school The school to check permissions for
     *
     */
    public function viewAll(User $user, $school): Response
    {
        //Permission checks for user go here
        $permitted = true;

        return $permitted && $school !== null
            ? Response::allow()
            : Response::deny('You do not have permissions to view employees for this school');
    }
}
