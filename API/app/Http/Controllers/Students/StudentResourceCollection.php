<?php

namespace App\Http\Controllers\Students;
 
use Illuminate\Http\Resources\Json\ResourceCollection;
 
class StudentResourceCollection extends ResourceCollection
{
    /**
     * The resource that this resource collects.
     *
     * @var string
     */
    public $collects = StudentResource::class;
}