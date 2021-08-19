<?php

namespace App\GraphQL\Queries;

class User{
    public function __invoke($_, array $args){
        $user = \App\Models\User::where("token", $args["token"])->first();



        $subsets = [];
        foreach ($user->subsetsId as $eSubsetId){
            $subsets[] = \App\Models\User::find($eSubsetId);
        }
        $user->subsets = $subsets;

        return $user;
    }
}
