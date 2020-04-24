<?php

namespace App\Models\Department;

use App\Models\Person\Person;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = [
        'department_name',
    ];

    public function persons()
    {
        return $this->hasMany(Person::class, 'person_id');
    }
}
