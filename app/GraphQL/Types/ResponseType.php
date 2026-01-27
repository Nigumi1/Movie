<?php

declare(strict_types=1);

namespace App\GraphQL\Types;

use Rebing\GraphQL\Support\Type as GraphQLType;
use GraphQL\Type\Definition\Type;

class ResponseType extends GraphQLType
{
    protected $attributes = [
        'name' => 'response_type',
        'description' => 'A type'
    ];

    public function fields(): array
    {
        return [
            'error' => [
                'type' => Type::boolean(),
            ],
            'message' => [
                'type' => Type::string(),
            ],
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
            ]
        ];
    }
}
