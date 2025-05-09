<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Helpers\FormatHelper;
use App\Helpers\MessageHelper;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
          
           
        ]);

        $user = User::where('email', $request->email)->first();

        //check user
        if (!$user) {
            return response()->json([
                'status' => 'error',
                'message' => 'User not found'
            ], 404);
        }

        //check password
        if (!Hash::check($request->password, $user->password)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Password is not match'
            ], 404);
        }

        //generate token
        $token = $user->createToken('token')->plainTextToken;

        return response()->json([
            'token' => $token,
            'user' => $user
        ]);
    }


    // logout
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Logout successfully'
        ]);
    }


    // register
    public function register(Request $request)
{
    $validasi = Validator::make($request->all(), [
        'name' => ['required', 'string', 'max:255'],
        'telpon' => ['required', 'string', 'max:16', 'unique:users'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:6', 'confirmed'],
    ]);

    if ($validasi->fails()) {
        $valIndex = $validasi->errors()->all();
        return MessageHelper::error(false, $valIndex[0]);
    }

    $user = User::create([
        'name' => $request->name,
        'telpon' => $request->telpon, 
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    $detail = FormatHelper::resultUser($user->id);
    $token = $user->createToken('auth_token')->plainTextToken;

    $msg = "Berhasil Register";
    return MessageHelper::resultAuth(true, $msg, $detail, 200, $token);
}

}
