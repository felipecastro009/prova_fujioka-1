<?php

namespace App\Http\Controllers\Persons;

use App\Http\Controllers\Controller;
use App\Models\Person\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    private $persons;

    public function __construct(Person $persons)
    {
        $this->persons = $persons;
    }

    public function index()
    {
        $query = $this->persons;

        $results = $this->persons->all();

        return response()->json([
            'success' => true,
            'data' => $results,
        ], 200);
    }

    public function store(Request $request)
    {
        $result = $this->persons->create($request->all());

        return response()->json([
            'success' => true,
            'data' => $result,
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $result = $this->persons->where('id', $id)->firstOrfail();

        $result->update($request->all());

        $result->save();

        return response()->json([
            'success' => true,
            'data' => $result,
        ], 200);
    }

    public function destroy($id)
    {
        $result = $this->persons->where('id', $id)->firstOrfail();

        $result->delete();

        return response()->json([
            'success' => true,
            'title' => 'Pessoa deletada com sucesso',
        ], 200);
    }
}
