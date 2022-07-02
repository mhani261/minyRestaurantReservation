<?php

namespace App\Http\Controllers;

use App\Http\Resources\MealCollection;
use App\Services\MealService;

class MealController extends Controller
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

        return response(new MealCollection($meals), 200);
    }

}
