<?php

declare(strict_types=1);

namespace App\GraphQL\Unions;

use Rebing\GraphQL\Support\UnionType;
use Rebing\GraphQL\Support\Facades\GraphQL;

class MovieUnion extends UnionType
{
    protected $attributes = [
        'name' => 'movie_union',
        'description' => 'A type'
    ];

    public function types(): array
    {
        return [
            GraphQL::type('movie_type'),
            GraphQL::type('result_type'),
        ];
    }

    public function resolveType($value)
    {
        if (isset($value['results'])) {
            return GraphQL::type('movie_type');
        }

        if (isset($value['id'])) {
            return GraphQL::type('result_type');
        }

        return null;

    }
}
