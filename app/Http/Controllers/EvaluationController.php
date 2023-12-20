<?php

// app/Http/Controllers/EvaluationController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Evaluation;

class EvaluationController extends Controller
{
    public function showProjectsToEvaluator(Request $request)
    {
        // Assuming you have an authenticated evaluator (you may implement middleware for this)
        $evaluator = $request->user();

        // Retrieve projects assigned to the evaluator
        $assignedProjects = $evaluator->assignedProjects;

        return response()->json(['projects' => $assignedProjects]);
    }

    public function rateProject(Request $request, $projectId)
    {
        $request->validate([
            'rating' => 'required|integer|between:1,10',
        ]);

        $project = Project::findOrFail($projectId);

        // Assuming you have an authenticated evaluator (you may implement middleware for this)
        $evaluator = $request->user();

        // Check if the evaluator is assigned to the project
        if (!$evaluator->assignedProjects->contains($project)) {
            return response()->json(['error' => 'Evaluator is not assigned to this project'], 403);
        }

        // Save the evaluation result
        $evaluation = Evaluation::updateOrCreate(
            ['evaluator_id' => $evaluator->id, 'project_id' => $project->id],
            ['rating' => $request->rating]
        );

        return response()->json(['message' => 'Project rated successfully']);
    }

    public function viewEvaluationResults(Request $request)
    {
        // Assuming you have an authenticated admin (you may implement middleware for this)
        $admin = $request->user();

        // Retrieve all evaluation results (you may want to filter or paginate based on your needs)
        $evaluationResults = Evaluation::all();

        return response()->json(['evaluation_results' => $evaluationResults]);
    }
}
