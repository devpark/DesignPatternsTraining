<?php
namespace App\Shipping\Countries\Uk;

use App\Contracts\IBoxingCalculation;
use App\Contracts\ICountryShippingCalc;
use App\Contracts\IShippingBox;
use App\Shipping\Countries\CalculationsBuilder;
use App\Shipping\Countries\Uk\BoxPricing\DefaultBoxUk;
use App\Shipping\Countries\Uk\BoxPricing\PremiumBoxUk;
use App\Shipping\Countries\Uk\BoxPricing\UefaChampionBox;


class CalculationsBuilderUk extends CalculationsBuilder
{
    public function useBoxPricing():IBoxingCalculation
    {
        $default_box = new DefaultBoxUk($this->boxing_properties);
        $premium_box_decorator = new PremiumBoxUk($default_box);
        $uefa_champion_decorator = new UefaChampionBox($premium_box_decorator);

        return $uefa_champion_decorator;
    }
}