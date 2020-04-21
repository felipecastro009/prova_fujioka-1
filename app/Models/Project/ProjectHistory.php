<?php

namespace App\Models\Project;

use Illuminate\Database\Eloquent\Model;

class ProjectHistory extends Model
{
    protected $fillable = [
        'start_date',
        'end_date',
        'person_id'
    ];
}
