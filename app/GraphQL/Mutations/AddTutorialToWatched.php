<?php

namespace App\GraphQL\Mutations;

use App\Models\User;

class AddTutorialToWatched{

    public function __invoke($_, array $args){
        $user = User::where("token",$args["token"])->first();
        $user->watchedTutorialsId = array_merge([$args["tutorialId"]], $user->watchedTutorialsId ?? []);
        $user->save();
        return $user;
    }
}
