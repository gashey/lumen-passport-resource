<?php

namespace Gashey\LumenPassport;


use App\Service;
use App\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Support\Str;

class TokenToUserProvider implements UserProvider
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }
    public function retrieveById($identifier)
    {
        return $this->user->where('client_id', '=', $identifier)->first();
    }
    public function retrieveByToken($identifier, $token)
    {
        return null;
    }
    public function updateRememberToken(Authenticatable $user, $token)
    {
        // update via remember token not necessary
    }
    public function retrieveByCredentials(array $credentials)
    {
        return null;
    }
    public function validateCredentials(Authenticatable $user, array $credentials)
    {
        return null;
    }
}
