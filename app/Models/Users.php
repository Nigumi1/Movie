<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;
use Laravel\Passport\Contracts\OAuthenticatable;
use Hash;

class Users extends Authenticatable implements OAuthenticatable
{
    use HasApiTokens;

    protected $table = 'tblUsers';

    protected $fillable = [
        'fldUsersName',
        'fldUsersEmail',
        'fldUsersPassword',
    ];

    protected $hidden = [
        'fldUsersPassword',
    ];

    public function findForPassport($email)
    {
        return $this->where('fldUsersEmail', $email)->first();
    }

    public function getAuthPassword(){
        return $this->fldUsersPassword;
    }

    public function registerUsers($data) {
        try {
            if (!$data) {
                return [
                    'error' => true,
                    'message' => 'No Data Found'
                ];
            }

            self::create([
                'fldUsersName' => $data['username'],
                'fldUsersEmail' => $data['email'],
                'fldUsersPassword' => Hash::make($data['password']),
            ]);

            return [
                'error' => false,
                'message' => 'User Successfully Registered'
            ];
        } catch (\Exception $e) {
            return [
                'error' => true,
                'message' => 'Something wrong with Model ' . $e->getMessage(),
            ];
        }
    }
}
