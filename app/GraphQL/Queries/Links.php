<?php

namespace App\GraphQL\Queries;

use App\Models\User;
use App\Models\Link;
use Illuminate\Database\Eloquent\Collection;

class Links
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args):Collection{
        $user = User::where("token", $args["token"])->first();
        return Link::where("creatorId", $user->id)->get();
    }
}
