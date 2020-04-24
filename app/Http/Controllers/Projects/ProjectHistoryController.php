<?php

namespace App\Http\Controllers\Projects;

use App\Http\Controllers\Controller;
use App\Models\Project\ProjectHistory;
use Illuminate\Http\Request;

class ProjectHistoryController extends Controller
{
    private $histories;

    public function __construct(ProjectHistory $histories)
    {
        $this->histories = $histories;
    }

    public function index()
    {
        $query = $this->histories;

        $results = $this->histories->all();

        return response()->json([
            'success' => true,
            'data' => $results,
        ], 200);
    }

    public function store(Request $request)
    {
        $result = $this->histories->create($request->all());

        return response()->json([
            'success' => true,
            'data' => $result,
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $result = $this->histories->where('id', $id)->firstOrfail();

        $result->update($request->all());

        $result->save();

        return response()->json([
            'success' => true,
            'data' => $result,
        ], 200);
    }

    public function destroy($id)
    {
        $result = $this->histories->where('id', $id)->firstOrfail();

        $result->delete();

        return response()->json([
            'success' => true,
            'title' => 'Historico deletada com sucesso',
        ], 200);
    }
}
