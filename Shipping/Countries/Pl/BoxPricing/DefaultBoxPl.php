<?php


namespace App\Shipping\Countries\Pl\BoxPricing;

use App\Contracts\IBoxingCalculation;
use App\Contracts\IPrice;
use App\Contracts\IShippingBox;
use App\Currencies;
use App\Shipping\CommonCalculations\BoxPricing\DefaultBox;
use App\Shipping\PriceFactory;

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