<?php

namespace App\Services;

use App\Models\User;

class AuthService
{
    /**
     * @param  User  $user
     * @param  string  $device
     * @return \Laravel\Sanctum\string|string
     */
    public function token(User $user, string $device = 'api')
    {
        return $user->createToken($device)->plainTextToken;
    }

}
