<?php

namespace App\Http\Controllers;

use App\Http\Resources\MealCollection;
use App\Services\MealService;
use Illuminate\Http\Response as HttpResponse;

class MealController extends ApiController
{
    /**
     * @var MealService
     */
    public $mealService;

    public function __construct(MealService $mealService)
    {
        $this->mealService = $mealService;
    }

    public function getAvailableMeals()
    {
        $meals = $this->mealService->getAvailableMeals();

        return $this
            ->setStatusCode(HttpResponse::HTTP_OK)
            ->responseWithData(new MealCollection($meals));
    }
}
