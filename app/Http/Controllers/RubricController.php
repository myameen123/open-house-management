<?php

// app/Http/Controllers/RubricController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rubric;

class RubricController extends Controller
{
    public function createRubric(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'metrics' => 'required|array|min:1',
            'metrics.*.name' => 'required|string|max:255',
            'metrics.*.max_score' => 'required|integer|min:1',
        ]);

        $rubric = Rubric::create([
            'name' => $request->name,
            'metrics' => $request->metrics,
        ]);

        return response()->json(['message' => 'Rubric created successfully']);
    }

    public function viewRubrics(Request $request)
    {
        $rubrics = Rubric::all();

        return response()->json(['rubrics' => $rubrics]);
    }

    public function viewRubric(Request $request, $rubricId)
    {
        $rubric = Rubric::findOrFail($rubricId);

        return response()->json(['rubric' => $rubric]);
    }
}
