<?php
namespace App\Shipping\Countries\OtherCountries;

use App\Contracts\IBoxingCalculation;
use App\Shipping\CommonCalculations\CalculationsBuilder;
use App\Shipping\Countries\OtherCountries\BoxPricing\DefaultBoxWorld;
use App\Shipping\Countries\OtherCountries\BoxPricing\PremiumBoxWorld;


class CalculationsBuilderWorld extends CalculationsBuilder
{
    public function useBoxPricing():IBoxingCalculation
    {
        $default_box = new DefaultBoxWorld($this->boxing_properties);
        $box_price_decorator = new PremiumBoxWorld($default_box);

        return $box_price_decorator;
    }
}