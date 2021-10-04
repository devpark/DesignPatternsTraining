<?php


namespace App\Shipping\Countries\Us\BoxPricing;

use App\Currencies;
use App\Shipping\CommonCalculations\BoxPricing\DefaultBox;

class DefaultBoxUs extends DefaultBox
{
    protected function getCountryPrice()
    {
        return 0;
    }

    protected function getCurrency()
    {
        return Currencies::US;
    }
}