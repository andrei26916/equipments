<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Http\Resources\AuthResource;
use App\Services\AuthService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * @param  AuthRequest  $request
     * @param  AuthService  $service
     * @return AuthResource
     */
    public function auth(AuthRequest $request, AuthService $service)
    {
        return new AuthResource([
            'tokin' => $service->token($request->getUser())
        ]);
    }
}
