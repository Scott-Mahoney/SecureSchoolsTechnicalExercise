<?php

namespace App\Http\Controllers\Classes;
 
use Illuminate\Http\Resources\Json\ResourceCollection;
 
class ClassResourceCollection extends ResourceCollection
{
    /**
     * The resource that this resource collects.
     *
     * @var string
     */
    public $collects = ClassResource::class;
}