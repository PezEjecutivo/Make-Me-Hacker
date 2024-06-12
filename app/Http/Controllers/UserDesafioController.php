<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserDesafio;
use Illuminate\Support\Facades\Auth;

class UserDesafioController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'desafio_id' => 'required|exists:desafios,id',
        ]);

        UserDesafio::create([
            'user_id' => Auth::id(),
            'desafio_id' => $request->desafio_id,
        ]);

        return response()->json(['success' => true]);
    }
}
