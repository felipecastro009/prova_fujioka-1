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

    public function index(Request $request)
    {
        $query = $this->tasks;

        // Filter by status param
        if ($request->filled('status')):
            $query->status($request->get('status'));
        endif;

        // Filter by date
        if ($request->filled('inicio') && $request->filled('fim')):
            $start_date = $request->get('inicio');
            $end_date = $request->get('fim');
            $query->where('start_date', '>=', $start_date)
                ->where('end_date', '<=', $end_date);
        endif;

        $results = $query->orderBy('id', 'ASC')->get();

        return response()->json([
            'success' => true,
            'data' => $results,
        ], 200);
    }

    public function dates($incio, $fim)
    {
        $results = $this->tasks->where('start_date', '>=', $incio)->where('end_date', '<=', $fim)->orderBy('id', 'ASC')->get();

        return response()->json([
            'success' => true,
            'data' => $results,
        ], 200);
    }

    public function active($incio, $fim)
    {
        $results = $this->tasks->where('status', 1)->where('start_date', '>=', $incio)->where('end_date', '<=', $fim)->orderBy('id', 'ASC')->get();

        return response()->json([
            'success' => true,
            'data' => $results,
        ], 200);
    }

    public function deactive($incio, $fim)
    {
        $results = $this->tasks->where('status', 2)->where('start_date', '>=', $incio)->where('end_date', '<=', $fim)->orderBy('id', 'ASC')->get();

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
