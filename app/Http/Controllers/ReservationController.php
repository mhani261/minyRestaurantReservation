<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateReservation;
use App\Http\Resources\ReservationResource;
use App\Services\ReservationService;

class ReservationController extends Controller
{
    /**
     * @var ReservationService
     */
    protected $reservationService;

    public function __construct(ReservationService $reservationService)
    {
        $this->reservationService = $reservationService;
    }

    public function store(CreateReservation $request)
    {
        $reservation = $this->reservationService->create($request->validated());
        return response(new ReservationResource($reservation), 200);
    }

    public function getReservations()
    {
        //todo list all Reservations time not passed
        return ;
    }
}
