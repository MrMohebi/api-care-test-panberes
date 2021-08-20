<?php

namespace App\GraphQL\Queries;

use GraphQL\Error\Error;
use App\Models\User;

class Subsets{
    public function __invoke($_, array $args){
        $upLineUser = User::where("token", $args["token"])->first();

        if(!in_array($args["id"], $upLineUser->subsetsId))
            throw new Error("you dint have access to this user");

        $user = User::find($args["id"]);
        $subsets = [];
        foreach ($user->subsetsId as $eSubsetId){
            $subsets[] = User::find($eSubsetId);
        }

        for ($i = 0; $i < count($subsets); $i++){
            $subsetsOfSubset = [];
            if(isset($subsets[$i]->subsetsId)){
                foreach ($subsets[$i]->subsetsId as $eSubsetId){
                    $subsetsOfSubset[] = User::find($eSubsetId);
                }
                $subsets[$i]->subsets = $subsetsOfSubset;
            }
        }

        return $subsets;
    }
}
