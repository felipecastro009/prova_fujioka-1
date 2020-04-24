<?php

namespace App\Models\Project;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title',
        'min_salary',
        'max_salary',
        'person_id'
    ];

    public function tasks()
    {
        return $this->hasMany(Project::class, 'project_id');
    }
}
