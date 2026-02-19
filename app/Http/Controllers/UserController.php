<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     *
     * user login
     *
     * @params \Illuminate\Http\Request $request
     * @return \Illumninate\Http\Response
     */
    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user || !\Hash::check($request->password, $user->password)) {
            return response([
                'message' => ['These credentials do not match our records.']
            ], 404);
        }

        $token = $user->createToken('api-token')->plainTextToken;

        $response = [
            'token' => $token
        ];

        return response()->json($response, 201);
    }
}
