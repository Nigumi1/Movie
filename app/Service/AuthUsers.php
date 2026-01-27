<?php

namespace App\Service;

use App\Models\Users;
use App\Service\PassportService;
use Hash;

class AuthUsers {
    public function authUsers($data){
        $checkEmail = Users::where('fldUsersEmail', $data['email'])->first();

        if (!$checkEmail) {
            return [
                'error' => true,
                'message' => 'Users not found'
            ];
        }

        $authenticatePass = Hash::check($data['password'], $checkEmail->fldUsersPassword);

        if (!$authenticatePass) {
            return [
                'error' => true,
                'message' => 'Wrong Password'
            ];
        }

        $passport = new PassportService();

        return $passport->loginToken($data);
    }
}