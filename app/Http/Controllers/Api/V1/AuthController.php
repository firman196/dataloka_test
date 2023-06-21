<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Helpers\ResponseFormatter;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login','register']]);
    }

    /**
     * Login user and generate token
     * @param Request $request
     * @return String $token
     */
    public function login(LoginRequest $request)
    {
        $validated = $request->validated();
        try {
            $token = $this->auth->login($validated);
            if (!$token) {
                return ResponseFormatter::error(
                    false,
                    "User Unauthorized",
                );
            }
    
            return ResponseFormatter::success(
                $token,
                "Login Successfully",
            );
        } catch (\Exception $e) {
            return ResponseFormatter::error(
                null,
                $e->getMessage(),
            );
        }
       
    }

    /**
     * Logout User
     * @return Boolean
     */
    public function logout()
    {
        try {
            $this->auth->logout();
            return ResponseFormatter::success(
                true,
                "Login Successfully",
            );
        } catch (\Exception $e) {
            return ResponseFormatter::error(
                false,
                $e->getMessage(),
            );
        }
    }
}
