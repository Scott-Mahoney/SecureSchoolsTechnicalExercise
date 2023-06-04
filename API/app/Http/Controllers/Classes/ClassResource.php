<?php

namespace App\Http\Controllers\Classes;

use App\Http\Controllers\Employees\EmployeeResource;
use App\Http\Controllers\Students\StudentResource;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
 
class ClassResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $students = new Collection($this->students->data ?? []);
        $employees = new Collection($this->employees->data ?? []);

        return [
            'id' => $this->id,
            'mis_id' => $this->mis_id,
            'name' => $this->name,
            'code' => $this->code,
            'description' => $this->description,
            'subject' => $this->subject,
            'alternative' => $this->alternative,
            'priority' => $this->priority,
            'meta' => $this->meta,
            'students' => StudentResource::collection($students),
            'employees' => EmployeeResource::collection($employees),
        ];
    }
}
