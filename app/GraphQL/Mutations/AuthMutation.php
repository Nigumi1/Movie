<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Service\AuthUsers;
use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use Rebing\GraphQL\Support\SelectFields;
use Rebing\GraphQL\Support\Facades\GraphQL;
use App\Models\Users;

class AuthMutation extends Mutation
{
    protected $attributes = [
        'name' => 'auth',
        'description' => 'A mutation'
    ];

    public function type(): Type
    {
        return GraphQL::type('response_type');
    }

    public function args(): array
    {
        return [
            'auth' => [
                'type' => GraphQL::type('auth_input')
            ]
        ];
    }

    protected function rules(array $args = []): array {
        $auth = $args['auth'];

        $rules = [];

        if ($auth['action_type'] == 'register'){
            $rules['auth.username'] = [
                'required'
            ];

            $rules['auth.email'] = [
                'required',
                'email',
                'unique:tblUsers,fldUsersEmail'
            ];

            $rules['auth.password'] = [
                'required'
            ];
        }

        return $rules;
    }

    public function validationErrorMessages(array $args = []): array {
        return [
            'auth.username.required' => 'Username is Required',
            'auth.email.required' => 'Email is Required',
            'auth.email.email' => 'Invalid Email',
            'auth.email.unique' => 'Email already exist',
        ];
    }

    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        $auth = $args['auth'];
        $users = new Users();
        $authUsers = new AuthUsers();

        if ($auth['action_type'] == 'register') {
            return $users->registerUsers($auth);
        }

        if ($auth['action_type'] == 'login') {
            return $authUsers->authUsers($auth);
        }
    }
}
