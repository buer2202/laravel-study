<?php

namespace App\Libraries\guards;

use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Auth\GuardHelpers;

class WechatWebGuard implements Guard
{
    use GuardHelpers;

    private $_appid     = 'wx681b890877ea335a';
    private $_appsecret = '132428d1e8b8f856a2f3e2a4b5df721e';
    protected $request;

    /**
     * Create a new authentication guard.
     *
     * @param  \Illuminate\Contracts\Auth\UserProvider  $provider
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    public function __construct(UserProvider $provider, Request $request)
    {
        $this->provider = $provider;
        $this->request = $request;
    }

    /**
     * Get the currently authenticated user.
     *
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function user()
    {
        if (! is_null($this->user)) {
            return $this->user;
        }

        $user = null;

        $token = $this->request->input('api_token');

        if (! empty($token)) {
            $user = $this->provider->retrieveByCredentials(
                ['api_token' => $token]
            );
        }

        return $this->user = $user;
    }


    /**
     * Validate a user's credentials.
     *
     * @param  array  $credentials
     * @return bool
     */
    public function validate(array $credentials = [])
    {

    }
}
