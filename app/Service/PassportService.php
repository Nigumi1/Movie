<?php

namespace App\Service;

use Illuminate\Support\Facades\Http;

class PassportService
{
    public function loginToken($data)
    {
        try {
            $response = Http::asForm()->post(config('services.passport.endpoint'), [
                'grant_type' => 'password',
                'client_id' => config('services.passport.clientId'),
                'client_secret' => config('services.passport.clientSecret'),
                'username' => $data['email'],
                'password' => $data['password'],
                'scope' => '',
            ]);

            $tokens = $response->json();

            return [
                'error' => false,
                'message' => 'Login Successfully',
                'accessToken' => $tokens['access_token'],
                'refreshToken' => $tokens['refresh_token'],
                'expiresIn' => $tokens['expires_in'],
                'tokenType' => $tokens['token_type']
            ];
        } catch (\Exception $e) {
            return [
                'error' => true,
                'message' => 'something wrong with services ' . $e->getMessage(),
            ];
        }
    }
}