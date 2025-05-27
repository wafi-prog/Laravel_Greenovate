<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Helpers\FormatHelper;
use App\Helpers\MessageHelper;
use Illuminate\Support\Facades\Auth;
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

public function updateProfile(Request $request)
{
    // Validasi request, semua field opsional tapi tervalidasi jika dikirim
    $validated = $request->validate([
        'name' => 'sometimes|string|max:255',
        'email' => 'sometimes|email|unique:users,email,' . Auth::id(),
        'password' => 'nullable|string|min:6',
        'telpon' => 'nullable|string|max:15',
        'image_profile' => 'nullable|image|mimes:jpg,jpeg,png,svg,gif',

    ]);

    // Ambil user yang sedang login (akan error 500 jika user tidak ditemukan)
    $user = User::findOrFail(Auth::id());

    // Update data jika field dikirim
    if ($request->has('name')) $user->name = $request->name;
    if ($request->has('email')) $user->email = $request->email;
    if ($request->filled('password')) $user->password = Hash::make($request->password);
    if ($request->has('telpon')) $user->telpon = $request->telpon;

    // Upload image jika ada (opsional, via file upload multipart)
 if ($request->hasFile('image_profile')) {
    $image_profile = $request->file('image_profile');
    $image_name = time() . '.' . $image_profile->getClientOriginalExtension();
    $path = $image_profile->storePubliclyAs('profile', $image_name, 'public');
    $user->image_profile = $image_name;
}



    $user->save();

    return response()->json([
        'status' => 'success',
        'data' => $user,
    ], 200);
}


}
