<?php

namespace App\Service;

use Illuminate\Support\Facades\Http;
use Carbon\Carbon;

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

            $formatDate = Carbon::createFromTimestamp($tokens['expires_in'])->format('Y-m-d H:i:s');

            return [
                'error' => false,
                'message' => 'Login Successfully',
                'accessToken' => $tokens['access_token'],
                'refreshToken' => $tokens['refresh_token'],
                'expiresIn' => $formatDate,
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