<?php

namespace App\Http\GraphQL;

use App\User;
use Illuminate\Support\Facades\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class Query
{
    public function AuthUsers($root, array $args, $context, $info)
    {
        $user = JWTAuth::parseToken()->authenticate();
        return compact('user');
    }
}
