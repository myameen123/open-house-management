<?php
// app/Models/Evaluator.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluator extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'preferences',

    ];

    protected $casts = [
        'preferences' => 'json', // Assuming preferences are stored as JSON
    ];

    public function assignedProjects()
    {
        return $this->hasMany(Project::class, 'evaluator_id'); // Assuming there is a foreign key 'evaluator_id' in the projects table
    }


}
