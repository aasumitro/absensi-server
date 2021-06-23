<?php

if (! function_exists('decode_jwt_from_request')) {
    function decode_jwt_from_request(\Illuminate\Http\Request $request): Object
    {
        $jwt = str_replace('Bearer ','',
            $request->header('authorization'));
        return (object) \Tymon\JWTAuth\Facades\JWTAuth::manager()
            ->getJWTProvider()
            ->decode($jwt);
    }
}
