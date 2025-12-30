<?php

declare(strict_types=1);

namespace App\GraphQL\Types;

use Rebing\GraphQL\Support\Type as GraphQLType;
use GraphQL\Type\Definition\Type;

class ResultType extends GraphQLType
{
    protected $attributes = [
        'name' => 'result_type',
        'description' => 'A type'
    ];

    public function fields(): array
    {
        return [
            'adult' => [
                'type' => Type::boolean(),
                'resolve' => fn($root) => $root['adult'] ?? null,
            ],
            'backdrop_path' => [
                'type' => Type::string(),
                'resolve' => fn($root) => $root['backdrop_path'] ?? null,
            ],
            'id' => [
                'type' => Type::int(),
                'resolve' => fn($root) => $root['id'] ?? null,
            ],
            'title' => [
                'type' => Type::string(),
                'resolve' => fn($root) => $root['title'] ?? $root['name'] ?? null,
            ],
            'original_language' => [
                'type' => Type::string(),
                'resolve' => fn($root) => $root['original_language'] ?? null,
            ],
            'original_title' => [
                'type' => Type::string(),
                'resolve' => fn($root) => $root['original_title'] ?? $root['original_name'] ?? null,
            ],
            'overview' => [
                'type' => Type::string(),
                'resolve' => fn($root) => $root['overview'] ?? null,
            ],
            'poster_path' => [
                'type' => Type::string(),
                'resolve' => fn($root) => $root['poster_path'] ?? null,
            ],
            'media_type' => [
                'type' => Type::string(),
                'resolve' => fn($root) => $root['media_type'] ?? null,
            ],
            'genre_ids' => [
                'type' => Type::listOf(Type::int()),
                'resolve' => fn($root) => $root['genre_ids'] ?? [],
            ],
            'popularity' => [
                'type' => Type::float(),
                'resolve' => fn($root) => $root['popularity'] ?? null,
            ],
            'release_date' => [
                'type' => Type::string(),
                'resolve' => fn($root) => $root['release_date'] ?? $root['first_air_date'] ?? null,
            ],
            'video' => [
                'type' => Type::boolean(),
                'resolve' => fn($root) => $root['video'] ?? null,
            ],
            'vote_average' => [
                'type' => Type::float(),
                'resolve' => fn($root) => $root['vote_average'] ?? null,
            ],
            'vote_count' => [
                'type' => Type::int(),
                'resolve' => fn($root) => $root['vote_count'] ?? null,
            ],
        ];
    }
}
