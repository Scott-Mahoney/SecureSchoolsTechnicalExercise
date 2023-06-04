<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'upi',
        'mis_id',
        'initials',
        'title',
        'surname',
        'forename',
        'middle_names',
        'legal_surname',
        'legal_forename',
        'gender',
        'date_of_birth',
        'classes'
    ];
}
