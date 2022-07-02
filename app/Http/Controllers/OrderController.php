<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlaceOrderRequest;
use App\Http\Resources\CheckoutResource;
use App\Http\Resources\OrderResource;
use App\Models\Table;
use App\Services\OrderService;
use Illuminate\Http\Response as HttpResponse;

class OrderController extends ApiController
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
        return $this
            ->setStatusCode(HttpResponse::HTTP_OK)
            ->responseWithData(new OrderResource($this->orderService->placeOrder($request->validated())));
    }

    public function getCheckout(Table $table)
    {
        $this->orderService->closeOrder($table);
        $order = $this->orderService->getTableCheckout($table);

        return $this
            ->setStatusCode(HttpResponse::HTTP_OK)
            ->responseWithData(new CheckoutResource($order));
    }
}
