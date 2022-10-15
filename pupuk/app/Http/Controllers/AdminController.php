<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Ramsey\Uuid\Uuid;

class AdminController extends Controller
{

    public $successStatus = 200;
    public function register(Request $request)
    {
        $validator  = Validator::make($request->all(), [
            'name' => ' required',
            'username' => 'required',
            'password' => 'required',
            'c_password' => 'required|same:password',
            'phone_number' => 'required',
            'profile_picture' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        } else {
            $input = $request->all();

            // For Random String for ID
            $input['id'] = Uuid::uuid4()->getHex();
            // For Encrypt Password
            $input['password'] = bcrypt($input['password']);

            $user = Admin::create($input);

            event(new Registered($user));

            return response()->json(
                [
                    'data admin' => $user,
                ],
                $this->successStatus
            );
        }
    }

    public function login(Request $request)
    {
        if (auth()->guard('admin')->attempt($request->only('username', 'password'))) {
            $admin = Admin::where('username', $request->username)->first();
            $token =  $admin->createToken('admin')->plainTextToken;
            $data['admin'] = $admin;
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
        $user = $request->user('admin');
        $user->currentAccessToken()->delete();

        return response()->json(
            [
                'message' => 'Berhasil LogOut'
            ],
            $this->successStatus
        );
    }
}
