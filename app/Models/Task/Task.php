<?php

namespace App\Models\Task;

use App\Models\Project\Project;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'title',
        'description',
        'task_points',
        'status',
        'start_date',
        'end_date',
        'project_id',
    ];

    /**
     * Scopes
     */
    public function scopeStatus($query, $status)
    {
        $query->where('status', $status);
    }

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }
}
