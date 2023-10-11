<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Import the User model

class UserController extends Controller
{
    public function index()
    {
        $users = User::all(); // Correct variable name and model
        return response()->json(['users' => $users], 200); // Correct JSON format
    }
    public function show($id)
    {
        $user = User::find($id);
        return response()->json(['users', $user], 200);
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);

        $data = $request->all(); // Corrected usage
        $user = User::create($data);
        return response()->json(['user' => $user], 201);
    }
    public function destroy($id){
        $user = User::find($id);
        if (!$user) {
            return response()->json(['message', 'User not found!'], 404);
        }
        $user->delete();
        return response()->json(['message', 'User deleted with successefully'], 200);
    }
}
