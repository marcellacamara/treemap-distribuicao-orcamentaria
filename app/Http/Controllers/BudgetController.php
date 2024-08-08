<?php

namespace App\Http\Controllers;

use App\Models\Budget;
use Illuminate\Http\Request;

class BudgetController extends Controller
{
    public function index()
    {
        $budgets = Budget::all();

        $treemapData = $budgets->map(function ($budget) {
            $variation = ($budget->percentage_this_year - $budget->percentage_last_year) / $budget->percentage_last_year * 100;

            $color = $this->getColorBasedOnVariation($variation);

            return [
                'name' => $budget->department,
                'value' => $budget->percentage_this_year,
                'variation' => $variation,
                'color' => $color,
            ];
        });

        return view('budgets.index', ['treemapData' => $treemapData]);
    }

    private function getColorBasedOnVariation($variation)
    {
        if ($variation > 0) {
            return $this->getGreenIntensity($variation);
        } elseif ($variation < 0) {
            return $this->getRedIntensity(abs($variation));
        } else {
            return "#91C483";
        }
    }

    private function getGreenIntensity($variation)
    {
        $baseColor = [145, 196, 131];
        $factor = min(0.5, $variation / 100);

        $red = (int)($baseColor[0] * (1 - $factor));
        $green = (int)($baseColor[1] * (1 - $factor));
        $blue = (int)($baseColor[2] * (1 - $factor));

        return sprintf("rgb(%d, %d, %d)", $red, $green, $blue);
    }

    private function getRedIntensity($variation)
    {
        $baseColor = [255, 100, 100];
        $factor = min(0.5, $variation / 100);

        $red = (int)($baseColor[0] * (1 - $factor));
        $green = (int)($baseColor[1] * (1 - $factor));
        $blue = (int)($baseColor[2] * (1 - $factor));

        return sprintf("rgb(%d, %d, %d)", $red, $green, $blue);
    }
}
