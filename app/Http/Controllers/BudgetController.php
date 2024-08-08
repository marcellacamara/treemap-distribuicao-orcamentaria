<?php

namespace App\Http\Controllers;

use App\Models\Budget;
use App\Services\ColorIntensityCalculator;
use Illuminate\Http\Request;

class BudgetController extends Controller
{
    private $colorCalculator;

    public function __construct(ColorIntensityCalculator $colorCalculator)
    {
        $this->colorCalculator = $colorCalculator;
    }

    public function index()
    {
        $budgets = Budget::all();

        $treemapData = $budgets->map(function ($budget) {
            $variation = $budget->calculateVariation();
            $color = $this->colorCalculator->getColorBasedOnVariation($variation);

            return [
                'name' => $budget->department,
                'value' => $budget->percentage_this_year,
                'variation' => $variation,
                'color' => $color,
            ];
        });

        return view('budgets.index', ['treemapData' => $treemapData]);
    }
}
