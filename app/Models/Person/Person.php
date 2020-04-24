<?php

namespace App\Models\Person;

use App\Models\Department\Department;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone_number',
        'hire_date',
        'department_id'
    ];

    public function department()
    {
        return $this->belongsTo(Department::class, 'person_id');
    }
}
