<?php


namespace App\Shipping\Countries\OtherCountries\BoxPricing;

use App\Shipping\CommonCalculations\BoxPricing\PremiumBox;


class PremiumBoxWorld extends PremiumBox
{
    protected function getCurrentType()
    {
        return "PREMIUM_BOX";
    }

    protected function getCountryPrice()
    {
        return 17;
    }
}