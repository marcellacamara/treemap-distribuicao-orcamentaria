<?php

namespace App\Services;

class ColorIntensityCalculator
{
    private $baseGreen = [145, 196, 131]; // RGB para #91C483
    private $baseRed = [255, 100, 100]; // RGB para #FF6464

    public function getColorBasedOnVariation(float $variation): string
    {
        if ($variation > 0) {
            return $this->getGreenIntensity($variation);
        } elseif ($variation < 0) {
            return $this->getRedIntensity(abs($variation));
        } else {
            return $this->rgbToHex($this->baseGreen);
        }
    }

    private function getGreenIntensity(float $variation): string
    {
        $factor = min(0.5, $variation / 100);

        $red = (int)($this->baseGreen[0] * (1 - $factor));
        $green = (int)($this->baseGreen[1] * (1 - $factor));
        $blue = (int)($this->baseGreen[2] * (1 - $factor));

        return sprintf("rgb(%d, %d, %d)", $red, $green, $blue);
    }

    private function getRedIntensity(float $variation): string
    {
        $factor = min(0.5, $variation / 100);

        $red = (int)($this->baseRed[0] * (1 - $factor));
        $green = (int)($this->baseRed[1] * (1 - $factor));
        $blue = (int)($this->baseRed[2] * (1 - $factor));

        return sprintf("rgb(%d, %d, %d)", $red, $green, $blue);
    }

    private function rgbToHex(array $rgb): string
    {
        return sprintf("#%02x%02x%02x", $rgb[0], $rgb[1], $rgb[2]);
    }
}
