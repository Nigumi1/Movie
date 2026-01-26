<?php

declare(strict_types=1);

namespace App\GraphQL\Types;

use Rebing\GraphQL\Support\Type as GraphQLType;
use GraphQL\Type\Definition\Type;
use Illuminate\Support\Facades\Crypt;

class BookMarkType extends GraphQLType
{
    protected $attributes = [
        'name' => 'bookmark_type',
        'description' => 'A type'
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::string(),
                'resolve' => function ($root, $args) {
                    return Crypt::encryptString($root->id);
                },
                'id'
            ],
            'movieId' => [
                'type' => Type::int(),
                'alias' => 'movieId'
            ],
            'title' => [
                'type' => Type::string(),
                'alias' => 'fldTitle'
            ],
            'backdropPath' => [
                'type' => Type::string(),
                'alias' => 'fldBackdropPath'
            ],
            'overview' => [
                'type' => Type::string(),
                'alias' => 'fldOverview'
            ],
            'mediaType' => [
                'type' => Type::string(),
                'alias' => 'fldMediaType'
            ],
        ];
    }
}
