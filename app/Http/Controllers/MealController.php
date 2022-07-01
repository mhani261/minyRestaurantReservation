<?php

namespace App\Http\Controllers;

use App\Http\Resources\MealCollection;
use App\Services\MealsService;

class MealController extends Controller
{
    /**
     * @var MealsService
     */
    public $mealsService;

    public function __construct(MealsService $mealsService)
    {
        $this->mealsService = $mealsService;
    }

    public function getAvailableMeals()
    {
        $meals = $this->mealsService->getAvailableMeals();

        return response(new MealCollection($meals), 200);
    }

}
