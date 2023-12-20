<?php

// app/Models/Evaluation.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    use HasFactory;

    protected $fillable = [
        'evaluator_id',
        'project_id',
        'rating',
        // Add other evaluation-related fields as needed
    ];

    // Define relationships
    public function evaluator()
    {
        return $this->belongsTo(Evaluator::class, 'evaluator_id');
    }

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

    // Add other relationships or methods as needed
}
