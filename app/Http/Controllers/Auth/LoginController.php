<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\FamilyResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Facades\OutputService;

class LoginController extends Controller
{
    public function auth(Request $request)
    {
        $family = Auth::guard('sanctum')->user();
        $data = $family ? new FamilyResource($family) : null;
        return OutputService::init($data)->response();
    }

    public function login(Request $request)
    {
        $credentials = $this->validate($request, $this->credentials());

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $family = Auth::user();
            $data = new FamilyResource($family);
            return OutputService::init($data)->response();
        }

        return OutputService::init(message: 'These credentials do not match our records.', code: 401)->response();
    }

    protected function credentials()
    {
        return [
            'email' => ['required', 'email'],
            'password' => ['required'],
        ];
    }

    protected function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return OutputService::init()->response();
    }
}
