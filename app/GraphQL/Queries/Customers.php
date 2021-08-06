<?php

namespace App\GraphQL\Queries;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class Customers
{

    public function __invoke($_, array $args):Collection{
        $user = User::where("token", $args["token"])->first();
        return Customer::where("marketerId", $user->id)->get();
    }
}
