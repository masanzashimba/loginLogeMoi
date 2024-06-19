<?php
namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    

    public function index()
    {
        return User::all();
    }

    public function store(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Attacher un rôle à l'utilisateur
        $user->addRole('propriétaire'); // Assurez-vous que le rôle existe

        return response()->json($user, 201);
    }

    public function show(User $user)
    {
        return $user;
    }

    public function update(Request $request, User $user)
    {
        $user->update($request->all());

        return response()->json($user, 200);
    }

    public function destroy(User $user)
    {
        $user->delete();

        return response()->json(null, 204);
    }
    public function login(Request $request)
{
    $loginData = $request->validate([
        'name' => 'required|string|name',
        'email' => 'required|string|email',
        'password' => 'required|string|min:8'
    ]);

    $user = User::where('email', $loginData['email'])->first();

    if (!$user || !Hash::check($loginData['password'], $user->password)) {
        return response()->json(['message' => 'Invalid Credentials'], 401);
    }

    $token = $user->createToken('authToken')->plainTextToken;

    return response()->json(['access_token' => $token], 200);
}

}
