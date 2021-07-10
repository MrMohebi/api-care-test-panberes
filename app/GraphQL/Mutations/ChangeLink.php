<?php

namespace App\GraphQL\Mutations;

use App\Models\Link;

class ChangeLink{

    public function __invoke($_, array $args):Link{
        $link = Link::find($args["id"]);
        if(!isset($link->id)){
            $emptyLink = new Link;
            $emptyLink->id = "link was not found";
            return $emptyLink;
        }
        if(isset($args["delete"]) && $args["delete"] == true){
            $link->delete();
        }
        $link->isChecked = $args["isChecked"];
        $link->save();
        return $link;
    }
}
