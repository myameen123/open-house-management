<?php

// app/Services/ProjectAssignmentService.php

namespace App\Services;

use App\Models\Evaluator;
use App\Models\Project;

class ProjectAssignmentService
{
    public function assignProjectsToEvaluators()
    {
        // Retrieve all evaluators with their preferences
        $evaluators = Evaluator::all();

        // Retrieve all projects with their keywords
        $projects = Project::all();

        // Assign projects to evaluators based on matching keywords and preferences
        foreach ($evaluators as $evaluator) {
            $matchingProjects = $this->getMatchingProjects($evaluator, $projects);

            // Limit the number of assigned projects to between 3 and 5
            $assignedProjects = $matchingProjects->take(random_int(3, 5));

            // Assign the projects to the evaluator (you might want to save this assignment to the database)
            $evaluator->assignedProjects = $assignedProjects;
        }

        // You can return or save the assignment data as needed
        return $evaluators;
    }

    private function getMatchingProjects(Evaluator $evaluator, $projects)
    {
        // Filter projects based on evaluator preferences and keywords
        return $projects->filter(function ($project) use ($evaluator) {
            return $this->matchEvaluatorPreferences($evaluator, $project)
                && $this->matchKeywords($evaluator->preferences, $project->keywords);
        });
    }

    private function matchEvaluatorPreferences(Evaluator $evaluator, Project $project)
    {
        // Implement your logic to check if the project matches evaluator preferences
        // For example, check if project category matches evaluator preferences
        return in_array($project->category, $evaluator->preferences);
    }

    private function matchKeywords($evaluatorPreferences, $projectKeywords)
    {
        // Implement your logic to check if there are matching keywords
        return count(array_intersect($evaluatorPreferences, $projectKeywords)) > 0;
    }
}
