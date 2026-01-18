<?php

declare(strict_types=1);

namespace App\GraphQL\Inputs;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\InputType;

class BookMarkInput extends InputType
{
    protected $attributes = [
        'name' => 'bookmark_input',
        'description' => 'An example input',
    ];

    public function fields(): array
    {
        return [
            'movieId' => [
                'type' => Type::int(),
            ],
            'title' => [
                'type' => Type::string(),
            ],
            'backdropPath' => [
                'type' => Type::string(),
            ],
            'overview' => [
                'type' => Type::string(),
            ],
            'mediaType' => [
                'type' => Type::string(),
            ],
            'action_type' => [
                'type' => Type::string(),
            ]
        ];
    }
}
