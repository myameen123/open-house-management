<?php

// routes/web.php or routes/api.php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\RubricController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentEvaluatorsController;
use App\Http\Controllers\StudentProjectAssessmentController;
use App\Http\Controllers\UserDashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    // Routes accessible only by users with the 'admin' role
    Route::get('/admin-dashboard', [AuthController::class, 'adminDashboard']);
});

Route::middleware(['auth', 'role:editor'])->group(function () {
    // Routes accessible only by users with the 'editor' role
    Route::get('/editor-dashboard', [AuthController::class, 'editorDashboard']);
});

// Other routes accessible by all authenticated users
Route::middleware('auth')->group(function () {
    Route::get('/user-dashboard', [AuthController::class, 'userDashboard']);
     Route::get('/user-dashboard', [UserDashboardController::class, 'index']);

    Route::middleware(['role:student'])->group(function () {
        Route::get('/student/evaluators', [StudentEvaluatorsController::class, 'index']);
        Route::get('/student/project/{projectId}/assessment', [StudentProjectAssessmentController::class, 'show']);
    });
});

Route::middleware(['auth', 'role:evaluator'])->group(function () {
    // Routes accessible only by users with the 'evaluator' role

    // Show projects to the evaluator
    Route::get('/evaluation/projects', [EvaluationController::class, 'showProjectsToEvaluator']);

    // Rate a project
    Route::post('/evaluation/rate/{projectId}', [EvaluationController::class, 'rateProject']);
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    // Routes accessible only by users with the 'admin' role

    // View evaluation results
    Route::get('/evaluation/results', [EvaluationController::class, 'viewEvaluationResults']);
});
// routes/api.php or routes/web.php


Route::middleware(['auth', 'role:student'])->group(function () {
    // Routes accessible only by users with the 'student' role

    // View assigned evaluators and their scores for each project
    Route::get('/student/evaluators', [StudentController::class, 'viewAssignedEvaluators']);

    // View project assessment by all evaluators
    Route::get('/student/project/{projectId}/assessment', [StudentController::class, 'viewProjectAssessment']);

    // View assessment by a specific evaluator for a project
    Route::get('/student/project/{projectId}/evaluator/{evaluatorId}/assessment', [StudentController::class, 'viewEvaluatorAssessment']);

    // View the count of evaluators who assessed a project
    Route::get('/student/project/{projectId}/evaluators/count', [StudentController::class, 'viewEvaluatorsAssessmentCount']);
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    // Routes accessible only by users with the 'admin' role

    // Create a rubric
    Route::post('/rubrics/create', [RubricController::class, 'createRubric']);

    // View all rubrics
    Route::get('/rubrics', [RubricController::class, 'viewRubrics']);

    // View a specific rubric
    Route::get('/rubrics/{rubricId}', [RubricController::class, 'viewRubric']);
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    // Routes accessible only by users with the 'admin' role

    // Set the physical location of a project
    Route::post('/admin/project/{projectId}/set-location', [AdminController::class, 'setProjectLocation']);

    // Manage evaluators
    Route::get('/admin/evaluators', [AdminController::class, 'manageEvaluators']);
    Route::post('/admin/evaluator/{evaluatorId}/assign-project/{projectId}', [AdminController::class, 'assignEvaluatorToProject']);

    // Manage rubrics
    Route::get('/admin/rubrics', [AdminController::class, 'manageRubrics']);
    Route::post('/admin/rubric/{rubricId}/assign-project/{projectId}', [AdminController::class, 'assignRubricToProject']);
});
