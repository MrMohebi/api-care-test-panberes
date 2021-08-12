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
            throw new Error("customerId is not valid");

        $args["items"] = json_decode($args["items"], true);
        $order = Order::create($args);
        $order->customerName = $customer->name;
        $order->save();
        $customer->push("ordersId", $order->id);
        return $order;
    }
}
