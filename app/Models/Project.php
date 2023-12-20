<?php

// app/Models/Project.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'fyp_group_id',
        'title',
        'keywords',
        // Add other project-related fields as needed
    ];

    protected $casts = [
        'keywords' => 'array', // Assuming keywords are stored as JSON
    ];

    // Define relationships
    public function fypGroup()
    {
        return $this->belongsTo(FYPGroup::class, 'fyp_group_id');
    }

    // Add other relationships or methods as needed
}
