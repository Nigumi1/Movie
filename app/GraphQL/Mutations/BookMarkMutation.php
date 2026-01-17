<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations;

use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use Rebing\GraphQL\Support\SelectFields;
use Rebing\GraphQL\Support\Facades\GraphQL;
use App\Models\BookMark;

class BookMarkMutation extends Mutation
{
    protected $attributes = [
        'name' => 'bookMark',
        'description' => 'A mutation'
    ];

    public function type(): Type
    {
        return GraphQL::type('response_type');
    }

    public function args(): array
    {
        return [
            'bookMark' => [
                'type' => GraphQL::type('bookmark_input')
            ]
        ];
    }

    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        $bookMarkModel = new BookMark();
        $bookMark = $args['bookMark'];

        if ($bookMark['action_type'] == 'add_to_bookmark') {
            return $bookMarkModel->addBookMark($bookMark['movieId'], $bookMark['mediaType']);
        }
    }
}
