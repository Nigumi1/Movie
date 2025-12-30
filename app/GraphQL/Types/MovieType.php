<?php

declare(strict_types=1);

namespace App\GraphQL\Types;

use Closure;
use GraphQL\Type\Definition\ListOfType;
use Rebing\GraphQL\Support\Type as GraphQLType;
use GraphQL\Type\Definition\Type;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\Facades\GraphQL;

class MovieType extends GraphQLType
{
    protected $attributes = [
        'name' => 'movie_type',
        'description' => 'A type'
    ];

    public function fields(): array
    {
        return [
            'page' => [
                'type' => Type::int(),
                'resolve' => function ($root) {
                    return $root['page'] ?? $root->page ?? null;
                }
            ],
            'results' => [
                'type' => Type::listOf(GraphQL::type('result_type')),
                'resolve' => function ($root) {
                    return $root['results'] ?? $root->results ?? null;
                }
            ],
            'total_pages' => [
                'type' => Type::int(),
                'resolve' => function ($root) {
                    return $root['total_pages'] ?? $root->total_pages ?? null;
                }
            ],
            'total_results' => [
                'type' => Type::int(),
                'resolve' => function ($root) {
                    return $root['total_results'] ?? $root->total_results ?? null;
                }
            ]
        ];
    }
}
