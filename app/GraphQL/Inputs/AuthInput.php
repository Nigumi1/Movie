<?php

declare(strict_types=1);

namespace App\GraphQL\Inputs;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\InputType;

class AuthInput extends InputType
{
    protected $attributes = [
        'name' => 'auth_input',
        'description' => 'An example input',
    ];

    public function fields(): array
    {
        return [
            'username' => [
                'type' => Type::string(),
            ],
            'email' => [
                'type' => Type::string(),
            ],
            'password' => [
                'type' => Type::string(),
            ],
            'refreshToken' => [
                'type' => Type::string(),
            ],
            'action_type' => [
                'type' => Type::string(),
            ]
        ];
    }
}
