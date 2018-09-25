<?php
namespace App\Http\GraphQL\Mutations;

use Tymon\JWTAuth\Facades\JWTAuth;

class AccountMutator
{
    public function login($root, array $args)
    {
        unset($args['directive']);

        if ( ! $token = JWTAuth::attempt($args)) {
            return ([
                'status' => 'error',
                'error' => 'invalid.credentials',
                'msg' => 'Invalid Credentials.'
            ]);
        }

        return ([
            'status' => 'success',
            'token' => $token
        ]);
    }

    public function logout($root, array $args) {

        JWTAuth::invalidate();
        return ([
            'status' => 'success',
            'msg' => 'Logged out Successfully.'
        ]);

    }
}
