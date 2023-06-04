<?php

declare(strict_types=1);

namespace App\Http\Controllers\Classes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Exception\HttpException;

class ClassController extends Controller
{
    /**
     * Classes GET endpoint
     *
     * @param Request $request The request object
     * @param string $school_id The ID of the school to get class details for
     * @param string $school_id The ID of the class to get details for
     *
     * @return JsonResponse|throwable
     */
    public function __invoke(Request $request, string $school_id, string $class_id)
    {
        // Not needed in this use case, as these permissions will likely be checked at the Wande API, and don't actually exist in the scope of this task
        // However I'm placing these here to demonstrate how I would process the request if the data was accessible directly from the DB rather than the Wande API
        //      $school = School::find($school_id);
        //      $this->authorize('view', [Class::class, $school]);
        // This way the user will get a permission error regardless of if they are missing permissions for an actual school, or are trying to access a non-existing school

        try {
            $client = new \Wonde\Client(env('WONDE_ACCESS_TOKEN'));
            $school = $client->school($school_id);

            //Doesn't seem to have built in support for the single class endpoint on the php client, though the endpoint does exist in the API, so we'll call it ourselves
            //We're getting a single class so we don't need to worry about pagination here
            $response = $school->get("{$school_id}/classes/{$class_id}", ['students', 'employees']);

            return (new ClassResource($response))
                ->response();
        } catch (\Exception $ex) {
            //Pass the exception here to whatever error monitoring solution we're using, then return a generic 500 error to the user
            //For the tech test I'll just return the exception directly to the user
            throw new HttpException(500, $ex->getMessage());
        }
    }
}