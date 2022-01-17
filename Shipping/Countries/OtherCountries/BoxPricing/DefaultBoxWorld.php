<?php


namespace App\Shipping\Countries\OtherCountries\BoxPricing;

use App\Currencies;
use App\Shipping\CommonCalculations\BoxPricing\DefaultBox;

class DefaultBoxWorld extends DefaultBox
{
    protected function getCountryPrice()
    {
        return 0;
    }

    protected function getCurrency()
    {
        return Currencies::ETH;
    }
}