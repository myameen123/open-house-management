<?php
// app/Http/Controllers/StudentController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Evaluation;

class StudentController extends Controller
{
    public function viewAssignedEvaluators(Request $request)
    {
        $student = $request->user();

        // Retrieve projects for the student
        $studentProjects = $student->projects;

        // Retrieve evaluators and their scores for each project
        $evaluatorScores = [];

        foreach ($studentProjects as $project) {
            $evaluations = Evaluation::where('project_id', $project->id)->with('evaluator')->get();
            $evaluatorScores[$project->id] = $evaluations;
        }

        return response()->json(['evaluator_scores' => $evaluatorScores]);
    }

    public function viewProjectAssessment(Request $request, $projectId)
    {
        $student = $request->user();

        // Retrieve the project
        $project = Project::findOrFail($projectId);

        // Retrieve evaluators and their scores for the project
        $evaluatorScores = Evaluation::where('project_id', $project->id)->with('evaluator')->get();

        return response()->json(['evaluator_scores' => $evaluatorScores]);
    }

    public function viewEvaluatorAssessment(Request $request, $projectId, $evaluatorId)
    {
        $student = $request->user();

        // Retrieve the project and evaluator
        $project = Project::findOrFail($projectId);
        $evaluator = $project->evaluators()->findOrFail($evaluatorId);

        // Retrieve the evaluation score for the project and evaluator
        $evaluation = Evaluation::where('project_id', $project->id)
            ->where('evaluator_id', $evaluator->id)
            ->first();

        return response()->json(['evaluation' => $evaluation]);
    }

    public function viewEvaluatorsAssessmentCount(Request $request, $projectId)
    {
        $student = $request->user();

        // Retrieve the project
        $project = Project::findOrFail($projectId);

        // Count the number of evaluators who assessed the project
        $evaluatorsCount = Evaluation::where('project_id', $project->id)->count();

        return response()->json(['evaluators_count' => $evaluatorsCount]);
    }
}
