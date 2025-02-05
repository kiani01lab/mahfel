<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\LoginRequest;
use Domain\Shared\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __invoke(LoginRequest $request)
    {
        $request->validated($request->all());

        if (! Auth::attempt($request->only(['email', 'password']))) {
            return response()->json(
                data: null,
                status: 401,
            );
        }

        $user = User::firstWhere('email', $request->email);

        return response()->json(
            data: [
                'token' => $user
                    ->createToken('bearer '.$user->email, ['*'], now()->addWeeks(2))
                    ->plainTextToken,
            ],
            status: 200,
        );
    }
}
