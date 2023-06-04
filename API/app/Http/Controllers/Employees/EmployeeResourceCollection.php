<?php

namespace App\Http\Controllers\Employees;
 
use Illuminate\Http\Resources\Json\ResourceCollection;
 
class EmployeeResourceCollection extends ResourceCollection
{
    /**
     * The resource that this resource collects.
     *
     * @var string
     */
    public $collects = EmployeeResource::class;
}