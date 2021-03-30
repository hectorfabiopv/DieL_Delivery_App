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
                                "order" => $orders[$i],
                                "manager" => $orders[$i]->manager,
                                "user_delivery" => $orders[$i]->user_delivery,
                                "customer" => $orders[$i]->customer,
                                "details" => $orders[$i]->details
                            ];
        }

        return response()->json($orders, 200);
    }

    public function show($id_order)
    {
        $order = Order::find($id_order);
        $response = [
            "order" => $order,
            "manager" => $order->manager,
            "user_delivery" => $order->user_delivery,
            "customer" => $order->customer,
            "details" => $order->details
        ];
        return response()->json($response, 200);
    }

    public function store(Request $order)
    {
        $order = Order::create($order->all());
        return response()->json($order, 201);
    }

    public function update(Request $dataOrder, $orderToUpdate)
    {
        $order = Order::find($orderToUpdate);
        $order->update($dataOrder->all());
        return response()->json($order, 200);
    }

    public function delete(Order $order)
    {
        $order->delete();
        return response()->json(null, 204);
    }
}
