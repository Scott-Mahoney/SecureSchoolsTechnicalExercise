<?php

namespace App\Http\Controllers\Employees;

use App\Http\Controllers\Classes\ClassResource;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
 
class EmployeeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $classes = new Collection($this->classes->data ?? []);

        return [
            'id' => $this->id,
            'upi' => $this->upi,
            'mis_id' => $this->mis_id,
            'initials' => $this->initials,
            'title' => $this->title,
            'surname' => $this->surname,
            'forename' => $this->forename,
            'middle_names' => $this->middle_names,
            'legal_surname' => $this->legal_surname,
            'legal_forename' => $this->legal_forename,
            'gender' => $this->gender,
            'date_of_birth' => $this->date_of_birth,
            'classes' => ClassResource::collection($classes),
        ];
    }
}
