<?php

namespace App\GraphQL\Mutations;

use App\Models\Link;
use App\Models\User;


class CreateLink
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args):Link{
        $user = User::where("token", $args["token"])->first() ?? new User;
        $link = Link::create($args);
        $link->code = self::randomString(5);
        $link->testResult = array();
        $link->creatorId = $user->id;
        $link->creatorName = $user->firstname . " " . $user->lastname;
        $link->save();

        $userCreatedLinks = $user->linksId ?? [];
        array_push($userCreatedLinks, $link->id);
        $user->linksId = $userCreatedLinks;
        $user->save();

        return $link;
    }

    private static function randomString(int $length = 10):string {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
