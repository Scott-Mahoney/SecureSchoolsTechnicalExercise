<?php

declare(strict_types=1);

namespace App\Http\Controllers\Employees;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Exception\HttpException;

class EmployeesController extends Controller
{
    /**
     * Employees GET endpoint
     *
     * @param Request $request The request object
     * @param string $school_id The ID of the school to get employees for
     *
     * @return JsonResponse|throwable
     */
    public function __invoke(Request $request, string $school_id)
    {
        // Not needed in this use case, as these permissions will likely be checked at the Wande API, and don't actually exist in the scope of this task
        // However I'm placing these here to demonstrate how I would process the request if the data was accessible directly from the DB rather than the Wande API
        //      $school = School::find($school_id);
        //      $this->authorize('viewAll', [Employee::class, $school]);
        // This way the user will get a permission error regardless of if they are missing permissions for an actual school, or are trying to access a non-existing school

        try {
            $client = new \Wonde\Client(env('WONDE_ACCESS_TOKEN'));
            $school = $client->school($school_id);

            $employees = new Collection();

            foreach ($school->employees->all(['classes']) as $employee) {
                $employees->push(new Employee((array) $employee));
            }

            return EmployeeResource::collection($employees);
        } catch (\Exception $ex) {
            //Pass the exception here to whatever error monitoring solution we're using, then return a generic 500 error to the user
            //For the tech test I'll just return the exception directly to the user
            throw new HttpException(500, $ex->getMessage());
        }
    }
}