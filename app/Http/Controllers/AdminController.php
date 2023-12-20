<?php

// app/Http/Controllers/AdminController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Evaluator;
use App\Models\Rubric;

class AdminController extends Controller
{
    public function setProjectLocation(Request $request, $projectId)
    {
        $request->validate([
            'location' => 'required|string|max:255',
        ]);

        $project = Project::findOrFail($projectId);
        $project->location = $request->location;
        $project->save();

        return response()->json(['message' => 'Project location set successfully']);
    }

    public function manageEvaluators(Request $request)
    {
        $evaluators = Evaluator::all();

        return response()->json(['evaluators' => $evaluators]);
    }

    public function assignEvaluatorToProject(Request $request, $evaluatorId, $projectId)
    {
        $evaluator = Evaluator::findOrFail($evaluatorId);
        $project = Project::findOrFail($projectId);

        $project->evaluators()->attach($evaluator);

        return response()->json(['message' => 'Evaluator assigned to project successfully']);
    }

    public function manageRubrics(Request $request)
    {
        $rubrics = Rubric::all();

        return response()->json(['rubrics' => $rubrics]);
    }

    public function assignRubricToProject(Request $request, $rubricId, $projectId)
    {
        $rubric = Rubric::findOrFail($rubricId);
        $project = Project::findOrFail($projectId);

        $project->rubric()->associate($rubric);
        $project->save();

        return response()->json(['message' => 'Rubric assigned to project successfully']);
    }
}
