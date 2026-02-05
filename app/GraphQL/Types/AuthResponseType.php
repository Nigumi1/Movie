<?php

declare(strict_types=1);

namespace App\GraphQL\Types;

use Rebing\GraphQL\Support\Type as GraphQLType;
use GraphQL\Type\Definition\Type;

class AuthResponseType extends GraphQLType
{
    protected $attributes = [
        'name' => 'auth_response',
        'description' => 'A type'
    ];

    public function fields(): array
    {
        return [
            'accessToken' => [
                'type' => Type::string(),
            ],
            'refreshToken' => [
                'type' => Type::string(),
            ],
            'expiresIn' => [
                'type' => Type::int(),
            ],
            'tokenType' => [
                'type' => Type::string(),
            ],
        ];
    }
}
