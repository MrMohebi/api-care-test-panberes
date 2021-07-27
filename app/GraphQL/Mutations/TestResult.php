<?php

namespace App\GraphQL\Mutations;

use GraphQL\Error\Error;
use App\Models\Link;
use App\Models\User;


class TestResult{
    /**
     * @throws Error
     */
    public function __invoke($_, array $args):string{
        $args["testResult"] = json_decode($args["testResult"]);
        $codeArr = explode("_", $args["code"]);
        if(count($codeArr) > 1){
            $args["code"] = $codeArr[1];
            $user = User::where("uid", $codeArr[1])->first();
            if(!isset($user->id))
                throw new Error("url is not valid");

            $link = Link::create($args);
            $link->creatorId = $user->id;
            $link->creatorName = $user->name;
            $link->isChecked = false;
            $link->lastEditAt = time();
            $link->from = 0;
            $link->to = 0;
            $link->isEditable = true;
            $link->save();
            return $link->id;
        }else{
            $args["code"] = $codeArr[0];
            $link = Link::where("code", $codeArr[0])->first();
            if(!isset($link->id))
                throw new Error("url is not valid");
            $args["isChecked"] = false;
            $args["lastEditAt"] = time();
            $link->update($args);
            return $link->id;
        }
    }
}
