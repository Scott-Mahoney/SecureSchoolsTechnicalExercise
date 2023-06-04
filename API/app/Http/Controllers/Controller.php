<?php

namespace App\Http\Controllers;

use App\Models\School;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * Get the test school as a model
     * 
     * @param Request $request The request object
     * @param string $school_id The ID of the school to get employees for
     *
     * return School
     */
    public function getTestSchool(string $school_id = 'A1930499544'): School
    {
        return new School([
            'id' => $school_id
        ]);
    }
}
