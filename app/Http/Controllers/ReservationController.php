<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateReservation;
use App\Http\Resources\ReservationResource;
use App\Http\Resources\WaitListResource;
use App\Services\ReservationService;
use Illuminate\Http\Response as HttpResponse;

class ReservationController extends ApiController
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
        $tableValidation = $this->reservationService->checkTableCapacity($request->table_id, $request->guest_number);
        if ($tableValidation) {
            $waitList = $this->reservationService->putOnWaitList($request->validated());
            return $this
                ->setStatusCode(HttpResponse::HTTP_OK)
                ->responseWithData(new WaitListResource($waitList));
        }

        $reservation = $this->reservationService->create($request->validated());

        return $this
            ->setStatusCode(HttpResponse::HTTP_OK)
            ->responseWithData(new ReservationResource($reservation));
    }

    public function getReservations()
    {
        return $this
            ->setStatusCode(HttpResponse::HTTP_OK)
            ->responseWithData($this->reservationService->get());
    }
}
