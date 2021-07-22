<?php

namespace App\GraphQL\Mutations;

use GraphQL\Error\Error;
use App\Models\Order;
use App\Models\Customer;

class CreateCustomerOrder{
    /**
     * @throws Error
     */
    public function __invoke($_, array $args):Order{
        $customer = Customer::find($args["customerId"]);
        if(!isset($customer->id))
            throw new Error("asdf");

        $order = Order::create($args);
        $order->customerName = $customer->firstname. " " . $customer->lastname;
        $order->save();
        return $order;
    }
}
