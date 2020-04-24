<?php

namespace App\Http\Controllers\Projects;

use App\Http\Controllers\Controller;
use App\Models\Project\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    private $projects;

    public function __construct(Project $projects)
    {
        $this->projects = $projects;
    }

    public function index()
    {
        $query = $this->projects;

        $results = $this->projects->all();

        return response()->json([
            'success' => true,
            'data' => $results,
        ], 200);
    }

    public function store(Request $request)
    {
        $result = $this->projects->create($request->all());

        return response()->json([
            'success' => true,
            'data' => $result,
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $result = $this->projects->where('id', $id)->firstOrfail();

        $result->update($request->all());

        $result->save();

        return response()->json([
            'success' => true,
            'data' => $result,
        ], 200);
    }

    public function destroy($id)
    {
        $result = $this->projects->where('id', $id)->firstOrfail();

        $result->delete();

        return response()->json([
            'success' => true,
            'title' => 'Projeto deletada com sucesso',
        ], 200);
    }
}
