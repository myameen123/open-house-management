<?php


namespace App\Http\Controllers;

class StudentProjectAssessmentController extends Controller
{
    public function show($projectId)
    {
        return view('student.project-assessment', ['projectId' => $projectId]);
    }
}
