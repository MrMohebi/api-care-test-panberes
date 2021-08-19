<?php

namespace App\GraphQL\Mutations;

use App\Models\User;
use GraphQL\Error\Error;

class ChangeUser
{
    public function __invoke($_, array $args):User{
        $user = User::where("token", $args["token"])->first();

        if(isset($args["password"])){
            if(isset($args["oldPassword"]) && password_verify($args["oldPassword"], $user->password)){
                $user->password = password_hash($args["password"],PASSWORD_DEFAULT);
                $user->save();
            }else {
                throw new Error("oldPassword in not correct");
            }
        }

        $user->update($args);
        return $user;
    }
}
