<?php

namespace App\GraphQL\Queries;

use App\Models\Order;

class Customer{

    public function __invoke($_, array $args):\App\Models\Customer{
        $customer = \App\Models\Customer::find($args["id"]);
        $orders = [];
        foreach ($customer->ordersId as $orderId ){
            $orders[] = Order::find($orderId);
        }
        $customer->orders = $orders;
        return $customer;
    }
}
