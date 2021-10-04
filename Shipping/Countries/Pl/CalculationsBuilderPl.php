<?php
namespace App\Shipping\Countries\Pl;

use App\Contracts\IBoxingCalculation;
use App\Contracts\ICountryShippingCalc;
use App\Contracts\IShippingBox;
use App\Shipping\Countries\CalculationsBuilder;
use App\Shipping\Countries\Pl\BoxPricing\DefaultBoxPl;
use App\Shipping\Countries\Pl\BoxPricing\PremiumBoxPl;


class CalculationsBuilderPl extends CalculationsBuilder
{
    public function useBoxPricing():IBoxingCalculation
    {
        $default_box = new DefaultBoxPl($this->boxing_properties);

        $box_price_decorator = new PremiumBoxPl($default_box);

        return $box_price_decorator;
    }
}