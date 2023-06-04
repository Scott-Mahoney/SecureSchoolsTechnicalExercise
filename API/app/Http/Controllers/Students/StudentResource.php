<?php

namespace App\Http\Controllers\Students;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
 
class StudentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'upi' => $this->upi,
            'mis_id' => $this->mis_id,
            'initials' => $this->initials,
            'surname' => $this->surname,
            'forename' => $this->forename,
            'middle_names' => $this->middle_names,
            'legal_surname' => $this->legal_surname,
            'legal_forename' => $this->legal_forename,
            'gender' => $this->gender,
            'date_of_birth' => $this->date_of_birth,
        ];
    }
}
