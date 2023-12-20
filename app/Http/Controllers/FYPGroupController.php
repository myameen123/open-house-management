<?php

// app/Http/Controllers/FYPGroupController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FYPGroup;
use App\Models\Project; // Add this line

class FYPGroupController extends Controller
{
    public function manageProjects(Request $request)
    {
        $request->validate([
            'group_id' => 'required|exists:fyp_groups,id',
            'project_title' => 'required|string|max:255',
            'project_keywords' => 'required|array|min:1',
            'project_keywords.*' => 'string|max:255',
        ]);

        $fypGroup = FYPGroup::findOrFail($request->group_id);

        $project = Project::create([
            'fyp_group_id' => $fypGroup->id,
            'title' => $request->project_title,
            'keywords' => $request->project_keywords,
        ]);

        $fypGroup->projects()->save($project);

        return response()->json(['message' => 'Project added to the FYP group successfully']);
    }
}
