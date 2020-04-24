<?php

namespace App\Http\Controllers\Tasks;

use App\Http\Controllers\Controller;
use App\Models\Task\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    private $tasks;

    public function __construct(Task $tasks)
    {
        $this->tasks = $tasks;
    }

    public function index()
    {
        $query = $this->tasks;

        $results = $this->tasks->all();

        return response()->json([
            'success' => true,
            'data' => $results,
        ], 200);
    }

    public function store(Request $request)
    {
        $result = $this->tasks->create($request->all());

        return response()->json([
            'success' => true,
            'data' => $result,
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $result = $this->tasks->where('id', $id)->firstOrfail();

        $result->update($request->all());

        $result->save();

        return response()->json([
            'success' => true,
            'data' => $result,
        ], 200);
    }

    public function destroy($id)
    {
        $result = $this->tasks->where('id', $id)->firstOrfail();

        $result->delete();

        return response()->json([
            'success' => true,
            'title' => 'Tarefa deletada com sucesso',
        ], 200);
    }
}
