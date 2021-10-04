<?php


namespace App\Shipping\Countries\Pl\BoxPricing;

use App\Currencies;
use App\Shipping\CommonCalculations\BoxPricing\DefaultBox;


class DefaultBoxPl extends DefaultBox
{
    protected function getCountryPrice()
    {
        return 0;
    }

    protected function getCurrency()
    {
        return Currencies::PLN;
    }
}