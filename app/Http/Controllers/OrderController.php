<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlaceOrderRequest;
use App\Http\Resources\OrderResource;
use App\Models\Table;
use App\Services\OrderService;

class OrderController extends Controller
{
    /**
     * @var OrderService
     */
    protected $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function placeOrder(PlaceOrderRequest $request)
    {
        return response(new OrderResource($this->orderService->placeOrder($request->validated())), 200);
    }

    public function getCheckout(Table $table)
    {
        $this->orderService->closeOrder($table);
        return $this->orderService->getTableCheckout($table);
    }
}
