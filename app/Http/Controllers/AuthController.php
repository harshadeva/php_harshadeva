<?php

namespace App\Http\Controllers;

use App\Classes\CatchErrors;
use App\Http\Requests\LoginRequest;
use App\Repositories\User\UserInterface;
use Exception;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginView()
    {
        try {
            return view('auth.login');
        } catch (Exception $e) {
            return CatchErrors::throw($e);
        }
    }

    public function login(LoginRequest $request)
    {
        try {
            $validated = $request->validated();
            $userBranchInterface = App::make(UserInterface::class);
            $user = $userBranchInterface->getByEmail($validated['email']);
            if ($user == null) {
                return redirect()->back()->with(['error' => 'Password or email incorrect'], 403);
            }
            if (Auth::attempt(['email' => $validated['email'], 'password' => $validated['password'], 'status' => 1])) {
                return redirect()->route('home')->with(['message' => 'Logged in successfully'], 200);
            }
            return redirect()->back()->with(['error' => 'Password or email incorrect'], 403);
        } catch (Exception $e) {
            return CatchErrors::throw($e);
        }
    }

    public function logout()
    {
        try {
            Auth::logout();
            return redirect()->route('login');
        } catch (Exception $e) {
            return CatchErrors::throw($e);
        }
    }
}
