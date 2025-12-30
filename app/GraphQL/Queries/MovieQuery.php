<?php

declare(strict_types=1);

namespace App\GraphQL\Queries;

use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\SelectFields;
use Rebing\GraphQL\Support\Facades\GraphQL;

use App\Service\Movie;

class MovieQuery extends Query
{
    protected $attributes = [
        'name' => 'movie',
        'description' => 'A query'
    ];

    public function type(): Type
    {
        return GraphQL::type('movie_type');
    }

    public function args(): array
    {
        return [
            'page' => [
                'type' => Type::int(),
            ],
            'action_type' => [
                'type' => Type::string(),
            ],
        ];
    }

    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        $movieService = new Movie();
        if ($args['action_type'] == 'display_all')
        {
            return $movieService->displayAllMovie($args['page']);
        }
    }
}
