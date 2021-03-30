<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        $response = array();
        $sizeOrders = count($orders);

        for ($i=0; $i < $sizeOrders; $i++) {
            $response[$i] = [
                                $orders[$i],
                                "manager" => $orders[$i]->manager,
                                "user_delivery" => $orders[$i]->user_delivery,
                                "customer" => $orders[$i]->customer,
                                "orders_details" => $orders[$i]->details
                            ];
        }

        return response()->json($orders, 200);
    }

    public function show(Order $order)
    {
        return $order;
    }

    public function store(Order $order)
    {
        $order = Order::create($order->all());
        return response()->json($order, 201);
    }

    public function update(Order $orderToUpdate, Order $dataOrder)
    {
        $orderToUpdate->update($dataOrder->all());
        return response()->json($orderToUpdate, 200);
    }

    public function delete(Order $order)
    {
        $order->delete();
        return response()->json(null, 204);
    }
}
