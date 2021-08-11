<?php

namespace App\GraphQL\Queries;



class Customer{

    public function __invoke($_, array $args):\App\Models\Customer{
        return \App\Models\Customer::find($args["id"]);
    }
}
