<?php

namespace App\GraphQL\Mutations;

use App\Models\User;

class ChangeUser
{
    public function __invoke($_, array $args):User{
        $user = User::where("token", $args["token"])->first();
        $user->update($args);
        return $user;
    }
}
