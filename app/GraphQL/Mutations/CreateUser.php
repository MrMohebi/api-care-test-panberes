<?php

namespace App\GraphQL\Mutations;

use GraphQL\Error\Error;
use App\Models\User;


class CreateUser{
    /**
     * @throws Error
     */
    public function __invoke($_, array $args):User{
        if(isset(User::where("uid", $args["uid"])->first()->id))
            throw new Error("nationalCode is duplicated");

        $introducer = User::where("uid", $args["introducerId"])->first();
        if(!isset($introducer->id))
            throw new Error("introducer couldn't be found");

        $args["introducerId"] = $introducer->id;
        $hashedPass = password_hash($args["password"], PASSWORD_DEFAULT);
        unset($args["password"]);



        $user = User::create($args);
        $user->password = $hashedPass;
        $user->save();

        $introducer->subsetsId = array_merge(json_decode($introducer->subsetsId ?? "[]"), [$user->id]);
        $introducer->save();
        return $user;
    }
}
