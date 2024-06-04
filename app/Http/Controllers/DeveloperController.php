<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use app\Models\Developers;

class DeveloperController extends Controller
{
    public function index()
    {
        return Developers::all();
    }

    public function store(Request $request)
    {
        $developers = Developers::create($request->all());
        return response()->json($developers, 201);
    }

    public function show($id)
    {
        return Developers::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $developers = Developers::findOrFail($id);
        $developers->update($request->all());
        return response()->json($developers, 200);
    }

    public function destroy($id)
    {
        Developers::destroy($id);
        return response()->json(null, 204);
    }
}
