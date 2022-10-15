<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Ramsey\Uuid\Uuid;

class UserController extends Controller
{
    public $successStatus = 200;
    public function register(Request $request)
    {
        $validator  = Validator::make($request->all(), [
            'name' => ' required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
            'phone_number' => 'required',
            'rt' => 'required',
            'rw' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        } else {
            $input = $request->all();

            // For Random String for ID
            $input['id'] = Uuid::uuid4()->getHex();
            // For Encrypt Password
            $input['password'] = bcrypt($input['password']);

            $user = User::create($input);

            event(new Registered($user));

            return response()->json(
                [
                    'data user' => $user,
                ],
                $this->successStatus
            );
        }
    }

    public function login()
    {
        if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
            $user = Auth::user();

            $token =  $user->createToken('user')->plainTextToken;
            $data['user'] = $user;
            $data['token'] = $token;

            return response()->json(
                [
                    'success' => true,
                    'data' => $data,
                    'message' => 'Login Berhasil',
                ],
                $this->successStatus
            );
        } else {
            return response()->json(
                [
                    'success' => false,
                    'data' => '',
                    'message' => 'Login Gagal'
                ],
                401
            );
        }
    }

    public function logout(Request $request)
    {
        $user = $request->user();
        $user->currentAccessToken()->delete();

        return response()->json(
            [
                'message' => 'Berhasil LogOut'
            ],
            $this->successStatus
        );
    }
}