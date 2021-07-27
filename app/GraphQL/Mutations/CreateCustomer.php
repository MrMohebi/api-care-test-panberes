<?php

namespace App\GraphQL\Mutations;

use App\Models\Customer;
use App\Models\User;

class CreateCustomer{
    public function __invoke($_, array $args):Customer{
        $user = User::where("token", $args["token"])->first() ?? new User;
        $customer = Customer::create($args);
        $customer->marketerId = $user->id;
        $customer->marketerName = $user->name;
        $customer->save();
        return $customer;
    }
}
