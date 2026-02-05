<?php

declare(strict_types=1);

namespace App\GraphQL\Queries;

use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\SelectFields;
use App\Models\BookMark;
use Rebing\GraphQL\Support\Facades\GraphQL;

class BookMarkQuery extends Query
{
    protected $attributes = [
        'name' => 'bookMark',
        'description' => 'A query'
    ];

    public function type(): Type
    {
        return Type::listOf(GraphQL::type('bookmark_type'));
    }

    public function args(): array
    {
        return [
            'page' => [
                'type' => Type::int(),
            ],
            'perPage' => [
                'type' => Type::int(),
            ],
            'action_type' => [
                'type' => Type::string(),
            ]
        ];
    }

    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        $bookmarkModel = new BookMark();

        if ($args['action_type'] == 'display_bookmark') {
            return $bookmarkModel->displayBookMarks($args['page'], $args['perPage']);
        }
    }
}
