<?php

namespace App\Http\Controllers\Departments;

use App\Http\Controllers\Controller;
use App\Models\Department\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    private $departmetns;

    public function __construct(Department $departmetns)
    {
        $this->departmetns = $departmetns;
    }

    public function index()
    {
        $query = $this->departmetns;

        $results = $this->departmetns->all();

        return response()->json([
            'success' => true,
            'data' => $results,
        ], 200);
    }

    public function store(Request $request)
    {
        $result = $this->departmetns->create($request->all());

        return response()->json([
            'success' => true,
            'data' => $result,
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $result = $this->departmetns->where('id', $id)->firstOrfail();

        $result->update($request->all());

        $result->save();

        return response()->json([
            'success' => true,
            'data' => $result,
        ], 200);
    }

    public function destroy($id)
    {
        $result = $this->departmetns->where('id', $id)->firstOrfail();

        $result->delete();

        return response()->json([
            'success' => true,
            'title' => 'Departamento deletado com sucesso',
        ], 200);
    }
}
