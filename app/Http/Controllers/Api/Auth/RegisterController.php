<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\RegisterRequest;
use Domain\Shared\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function __invoke(RegisterRequest $request)
    {
        $request->validated($request->all());

        User::create([
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'email' => $request['email'],
            'mobile' => $request['mobile'],
            'password' => Hash::make($request['password']),
        ]);

        return response()->json(
            data: [
                'message' => 'ثبت نام با موفقیت انجام شد.',
            ]
            ,status: 201
        );
    }
}
