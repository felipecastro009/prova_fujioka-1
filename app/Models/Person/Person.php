<?php

namespace App\Models\Person;

use App\Models\Department\Department;
use App\Models\Project\Project;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $table = 'persons';

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
        return $this->belongsTo(Department::class, 'department_id');
    }

    public function projects()
    {
        return $this->hasMany(Project::class, 'person_id');
    }
}
