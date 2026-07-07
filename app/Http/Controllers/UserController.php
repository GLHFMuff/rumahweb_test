<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return response()->json(User::all());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required',
            'username' => 'required',
            'password' => 'required|min:6',
        ]);

        $validated['password'] = Hash::make($validated['password']);

        $user = User::create([
            'username' => $validated['username'],
            'password' => $validated['password'],
            'name' => $validated['first_name'] . ' ' . $request->last_name,
        ]);
        $userDetail = new UserDetail([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'birthdate' => $request->birth_date,
            'is_active' => true,
        ]);
        $user->userDetail()->save($userDetail);

        return response()->json($user, 201);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $userDetail = $user->userDetail;
    
        $validated = $request->validate([
            'first_name' => 'required',
            'username' => 'required|unique:users,username,' . $id,
        ]);
        
        if ($request->filled('password')) {
            $validated['password'] = Hash::make($request->password);
        }

        $user->update([
            'username' => $validated['username'],
            'password' => $validated['password'],
            'name' => $validated['first_name'] . ' ' . $request->last_name,
        ]);

        $userDetail->update([
            'first_name' => $validated['first_name'],
            'last_name' => $request->last_name,
            'birthdate' => $request->birth_date,
        ]);

        return response()->json($user);
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return response()->json([
            'message' => 'User berhasil dihapus'
        ], 200);
    }
}
