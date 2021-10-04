<?php
namespace App\Shipping\Countries\Us;

use App\Contracts\IBoxingCalculation;
use App\Shipping\CommonCalculations\CalculationsBuilder;
use App\Shipping\Countries\Us\BoxPricing\DefaultBoxUs;
use App\Shipping\Countries\Us\BoxPricing\PremiumBoxUs;


class CalculationsBuilderUs extends CalculationsBuilder
{

    public function useBoxPricing():IBoxingCalculation
    {
        $default_box = new DefaultBoxUs($this->boxing_properties);
        $box_price_decorator = new PremiumBoxUs($default_box);

        return $box_price_decorator;
    }
}