<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserDeveloper;
use Illuminate\Support\Facades\Auth;

class UserDeveloperController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'developer_id' => 'required|exists:developers,id',
            'active' => 'required|boolean',
        ]);

        $existingDeveloper = UserDeveloper::where('user_id', Auth::id())
            ->where('developer_id', $request->developer_id)
            ->where('active', true)
            ->first();

        if ($existingDeveloper) {
            return response()->json(['success' => false, 'message' => 'Ya tienes este developer activado, no puedes tener varias veces el mismo developer!.'], 400);
        }

        UserDeveloper::create([
            'user_id' => Auth::id(),
            'developer_id' => $request->developer_id,
            'active' => $request->active,
        ]);

        return response()->json(['success' => true]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'active' => 'required|boolean',
        ]);

        $userDeveloper = UserDeveloper::findOrFail($id);
        $userDeveloper->update([
            'active' => $request->active,
        ]);

        return response()->json(['success' => true]);
    }

    public function getActiveDevelopers()
    {
        $userDevelopers = UserDeveloper::where('user_id', Auth::id())
            ->where('active', 1)
            ->get();

        return response()->json(['userDevelopers' => $userDevelopers]);
    }
}
