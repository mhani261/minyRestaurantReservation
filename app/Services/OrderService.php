<?php

namespace App\Services;

use App\Models\Meal;
use App\Models\Order;
use App\Models\Table;
use Illuminate\Support\Facades\DB;

class OrderService
{
    public function placeOrder(array $orderData): Order
    {
        return DB::transaction(
            function () use ($orderData) {
                $order = Order::create($orderData);
                $orderItems = $orderData['meals'];

                $this->createOrderDetails($order, $orderItems);

                return $order->refresh();
            }
        );
    }

    public function createOrderDetails(Order $order, array $items)
    {
        foreach ($items as $key => $item) {
            $meal = Meal::find($item['id']);
            $order->orderItems()->create(
                [
                    'meal_id' => $meal->id,
                    'amount_to_pay' => $meal->final_price
                ]
            );
        }
    }

    public function closeOrder(Table $table)
    {
        $order = $table->lastOrder;
        $orderTotalAmount = $order->orderItems->sum('amount_to_pay');
        $orderTotalBeforeDiscount = $order->meals->sum('price');

        $table->lastOrder->update(
            [
                'total' => $orderTotalBeforeDiscount,
                'paid' => $orderTotalAmount
            ]
        );
    }

    public function getTableCheckout(Table $table)
    {
        return $table->lastOrder;
    }
}
